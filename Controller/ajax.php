<?php
/**
 * Created by PhpStorm.
 * User: Prandar
 * Date: 13/09/2018
 * Time: 10:23
 */

session_start();

$host = "localhost";
$dbName = "wee";
$login = "root";
$password = "";
$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbName . ';charset=utf8', $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
var_dump($bdd);
var_dump($_POST);

if (isset($_POST['titre']) && !empty($_POST['titre'])) {
    //$titre = mysql_real_escape_string(htmlspecialchars(trim($_POST['titre'])));
    $titre =        htmlspecialchars($_POST['titre']);
    $description =  htmlspecialchars($_POST['description']);
    $date_deb =     htmlspecialchars($_POST['date_debut']);
    $date_fin =     htmlspecialchars($_POST['date_fin']);
    $lieu =         htmlspecialchars($_POST['lieu']);
    $id_compte =    $_SESSION['id_co'];
    $id_categorie = htmlspecialchars($_POST['id_categorie']);

    $request = "INSERT INTO event(titre, description, date_debut, date_fin, lieu, id_co, id_cat) VALUES( '$titre','$description' ,'$date_deb' ,'$date_deb' ,'$lieu' , '$id_compte' ,'$id_categorie')";

    $bdd->exec( $request );
    var_dump($request);

} else {
    echo "error";
}