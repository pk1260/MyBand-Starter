<?php
/**
 * Dit is de Front controller
 * ALLE requests die naar de webserver worden gedaan worden via de .htaccess naar dit script gestuurd.
 * Zo voorkom je dat je heel veel PHP bestanden hebt met dubbele code en logica.
 *
 * Alle urls hebben de volgende structuur: http://localhost/<controller>/<actie>/<optionele parameters>
 *
 * Bijv: http://localhost/page/show/about-us
 * (roept de show functie aan in de page controller met de parameter 'about-us')
 *
 * controller: page
 * actie: show
 * parameter: about-us
 *
 * De Front Controller (dit bestand) doorloopt elke keer de volgende procedure:
 *
 * 1. Inspecteert de URL die wordt opgevraagd
 * 2. Zoekt op in een "routing" tabel of hij deze URL of dit URL patroon kent
 * 3. Zo niet, dan is het een 404 oagina, want de website kent deze url niet
 * 4. Als de url wel wordt herkend en er een "route" is naar de juiste code dan:
 *  A. Wordt de juiste controller actie aangeroepen
 *  B. De controller krijgt alle gegevens door (de url, $_GET, $_POST, $_FILES etc)
 *  C. De controller haalt eventueel gegevens op via de Model laag (database queries e.d.)
 *  D. De controller geeft de gegevens aan de juiste view
 *  E. De view toont de gegevens op de juiste manier (met behulp van een foreach, if, switch e.d.)
 *  F. De complete view (met data) wordt door de controller teruggestuurd naar de gebruiker (dit is de Response)
 *
 */

/**
 * Download de kant en klare "router" van de AltoRouter website en zet het bestand AltoRouter.php in je private includes map
 * https://github.com/dannyvankooten/AltoRouter/zipball/master
 *
 * Lees vooral de documentatie op http://altorouter.com/
 *
 */
require '../private/includes/AltoRouter.php';

/**
 * Verder willen we nog wat andere zaken instellen en goed zetten
 * Dit staat in het bestand private/includes/init.php
 */
$CONFIG = require '../private/includes/config.php';
require '../private/includes/init.php';

$router = new AltoRouter();

//Als jouw public folder niet te zien is als je naar http://localhoist gaat stel dan het juiste basePath in (pas dit pad aan naar jouw situatie)
$router->setBasePath($CONFIG['BASE_URL']);

/**
 * Hier stellen we de juiste "routes" in voor onze website
 * We vertellen de router welke url naar welk stukje code (de controller) moet worden doorgestuuurd.
 */

$router->map( 'GET', '/home', 'HomeController#homepage', 'home' );

$router->map( 'GET', '/photos', 'PhotosController#photospage', 'photos' );

$router->map( 'GET', '/about', 'AboutController#aboutpage', 'about-us' );

$router->map( 'GET', '/launch', 'LaunchController#launchpage', 'launch-1' );

$router->map( 'POST', '/launch', 'LaunchController#launchpage', 'launch-2' );

$router->map( 'GET', '/login', 'LoginController#loginpage', 'login-1' );

$router->map( 'POST', '/login', 'LoginController#loginpage', 'login-2' );

$router->map( 'GET', '/register', 'RegisterController#registerpage', 'register-1' );

$router->map( 'POST', '/register', 'RegisterController#registerpage', 'register-2' );

$router->map( 'GET', '/notfound', 'NotFoundController#notfound', 'notfound' );

$router->map( 'GET', '/voorbeeld', function () {
	echo 'Zo kun je ook een route afhandelen door een inline functie te gebruiken, maar dat wordt al snel rommelig (deze mag je dus weer weghalen of laten staan als voorbeeld';
} );

// Daarna vragen we $router of de huidige URL getmatcht kan worden.
$match = $router->match();

/**
 * Als er een "match" is dan roepen we de controller en de juiste method aan die we zelf hebben ingesteld
 * Je krijgt namelijk alle info terug in de $match variabele die je nodig hebt om de juiste code aan te roepen
 * Lees in de documentatie hoe je dit allemaal kunt doen met AltoRouter
 */
if ( is_array( $match ) && is_callable( $match['target'] ) ) {
	//Als het een inline function is roepen we deze meteen aan
	call_user_func_array( $match['target'], $match['params'] );

} else if ( $match !== false ) {
	//Anders hakken we de controller#method doormidden op het "#" teken en zetten we ze in twee variabelen
	list( $controller_name, $method ) = explode( '#', $match['target'] );

	try {
		// We maken een nieuwe "instance" aan van de juiste controller class
		$controller = new $controller_name;

		// We roepen we juiste method aan in de controller class
		call_user_func_array( [ $controller, $method ], $match['params'] );

	} catch ( \Exception $e ) {
		echo $e->getMessage();
		exit;
	}
} else {
	// Er is geen match dus een 404 pagina
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found' );
	echo '404: Onbekende pagina';
}
