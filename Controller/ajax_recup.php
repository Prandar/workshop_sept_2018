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

$requete = 'SELECT * FROM event ORDER by date_debut ASC';

$recup_events = $bdd->query( $requete );

while ($all = $recup_events->fetch()) {
    $events[] = $all;
}

foreach ($events as $event) {

    ?>
    <article id="carte_<?= $event['id_e'] ?>">
    <div id="carte_body_<?= $event['id_e'] ?>" class="inner">
                <span class="date">
                    <span class="day">11:00</span>
                    <span class="month"><?= $event['date_debut'] ?></span>
                    <span class="year">2018</span>
                </span>
        <h2 class="<?= $event['id_cat'] ?>"><?= $event['titre'] ?></h2>
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
