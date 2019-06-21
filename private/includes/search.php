<?php

// Veel gebruikte functies inladen
//require __DIR__ . 'functions.php';
require 'functions.php';
function search($text){
    $database = dbConnect();
    // filter de data die binnenkomt
    $text = htmlspecialchars($text);
    // select alleen de titels die overeen komen
    $get_titel = $database->prepare("SELECT titel FROM launch WHERE titel LIKE concat('%', :titel, '%')");
    // execute de query
    $get_titel -> execute(array('titel' => $text));
    // laat de titels op de pagina zien
    while($titels = $get_titel->fetch(PDO::FETCH_ASSOC)){
        // laat elke titel als link zien
        ?>
        <a href="?search_keyword=<?php echo urlencode($text)?>"><?php echo $titels['titel']; ?></a>
    <?php
    }
}
// call de zoek functie met de data van Ajax
search($_GET['txt']);

?>
