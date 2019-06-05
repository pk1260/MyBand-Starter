<?php
/**
 * Onderstaande code zorgt ervoor dat als we in onze code een controller willen gebruiken bijv:
 *
 * $controller = new HomeController();
 *
 * Dat ze automatisch uit de juiste map wordt ingeladen
 * Als het een class met de naam 'Controller' aan het einde is dan laden we die uit de juiste map!
 **/
spl_autoload_register( function ( $className ) {
	global $CONFIG;
	$lastPart = substr( $className, - 10 );
	if ( $lastPart !== 'Controller' ) {
		return;
	}
	$fileName = $CONFIG['PRIVATE'] . sprintf( '/controllers/%s.php', $className );
	if ( ! is_readable( $fileName ) ) {
		throw new \Exception( 'Het bestand ' . $fileName . ' bestaat niet, maak dit bestand aan met de juiste class er in!' );
	}

	require_once $fileName;
});