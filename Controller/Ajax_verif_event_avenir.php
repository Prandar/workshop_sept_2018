<?php
/**
 * Created by PhpStorm.
 * User: Prandar
 * Date: 13/09/2018
 * Time: 20:50
 */

session_start();

$host = "localhost";
$dbName = "wee";
$login = "root";
$password = "";
$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbName . ';charset=utf8', $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$events = array();
$id_co = $_SESSION['id_co'];

$stmt = $bdd->query('SELECT titre, DATE_FORMAT(date_debut, \'%d/%m/%Y\') AS date_debut FROM event e, participe p, compte c 
WHERE e.id_e = p.id_e and p.id_co = '.$bdd->quote($_SESSION['id_co']));

while ($all = $stmt->fetchAll()) {
    $events[] = $all;
}

foreach ($events[0] as $event) {
    //var_dump($events);
?>
<li class="list-group-item">
    <?= $event['titre'] ?> <?= $event['date_debut'] ?>
</li>
<?php
}
?>