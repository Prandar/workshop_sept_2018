<?php
/**
 * Created by PhpStorm.
 * User: Prandar
 * Date: 13/09/2018
 * Time: 22:25
 */

session_start();

$host = "localhost";
$dbName = "wee";
$login = "root";
$password = "";
$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbName . ';charset=utf8', $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$events = array();
$id_co = $_SESSION['id_co'];

$req = $bdd->query('SELECT e.titre,  DATE_FORMAT(e.date_debut, \'%d/%m/%Y\') as date_debut, (SELECT COUNT(p.id_co) FROM participe AS p WHERE p.id_e = e.id_e) AS participants FROM event e order by participants DESC LIMIT 5');
$donnees = $req->fetchAll();
foreach ($donnees as $event) {
    //var_dump($events);
    ?>
    <li class="list-group-item">
        <?= $event['titre'] ?> <?= $event['date_debut'] ?>
    </li>
    <?php
}
?>


