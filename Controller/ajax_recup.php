<?php
/**
 * Created by PhpStorm.
 * User: Prandar
 * Date: 13/09/2018
 * Time: 14:09
 */

$host = "localhost";
$dbName = "wee";
$login = "root";
$password = "";
$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbName . ';charset=utf8', $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$events = array();

$requete = 'SELECT * FROM event ORDER by date_debut DESC';

$recup_events = $bdd->query( $requete );

while ($all = $recup_events->fetch()) {
    $events[] = $all;
}

foreach ($events as $event) {
    switch ($event['id_cat']) {
        case 2 :
            $lacategorie =  'cinema';
            break;
        case 3 :
            $lacategorie =  'sport';
            break;
        case 4 :
            $lacategorie =  'culture';
            break;
        case 5 :
            $lacategorie =  'loisir';
            break;
        case 6 :
            $lacategorie =  'musique';
            break;
        case 7 :
            $lacategorie =  'soiree';
            break;
        case 8 :
            $lacategorie =  'autre';
            break;
    }

    $date_deb = explode("-", $event['date_debut']);

    switch ($date_deb[1]) {
        case "01" :
            $lemoidudeb =  'Jan';
            break;
        case "02" :
            $lemoidudeb =  'Fév';
            break;
        case "03" :
            $lemoidudeb =  'Mars';
            break;
        case "04" :
            $lemoidudeb =  'Avri';
            break;
        case "05" :
            $lemoidudeb =  'Mai';
            break;
        case "06" :
            $lemoidudeb =  'Juin';
            break;
        case "07" :
            $lemoidudeb =  'Juill';
            break;
        case "08" :
            $lemoidudeb =  'Aout';
            break;
        case "09" :
            $lemoidudeb =  'Sept';
            break;
        case "10" :
            $lemoidudeb =  'Oct';
            break;
        case "11" :
            $lemoidudeb =  'Nov';
            break;
        case "12" :
            $lemoidudeb =  'Déc';
            break;
        default :
            $lemoidudeb =  'Xxx';
            break;

    }
    ?>
    <article id="carte_<?= $event['id_e'] ?>" class="filtre_<?= $lacategorie ?>">
    <div id="carte_body_<?= $event['id_e'] ?>" class="inner">
                <span class="date <?= $lacategorie ?>">
                    <span class="day"><?= $date_deb[2] ?></span>
                    <span class="month"><?= $lemoidudeb ?></span>
                    <span class="year"><?= $date_deb[0] ?></span>
                </span>
        <h2 class="<?= $lacategorie ?>"><?= $event['titre'] ?></h2>
        <p id="p_<?= $event['id_e'] ?>'"><?= $event['description'] ?>
            <br>
            <button class="btn" data-toggle="modal" data-target="#comment_Modal"
                    onclick="comment(<?= $event['id_e'] ?>)"><i class="fas fa-comments"></i></button>
            <button class="btn" onclick="suppr_event()"><i class="fas fa-trash"></i></button>
            <button class="btn"><i class="fas fa-plus-circle"></i></button>
        </p>
    </div>
    </article><?php
}

?>
