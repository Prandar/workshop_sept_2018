<?php
include_once ("../Model/model.php");
//On récupère les informations du formulaire de connexion
$mail=$_POST["mail"];
$mdp_co=$_POST["mdp_co"];
$userObject=authenticateUser($mail,$mdp_co);
//Si il existe on lui met le statut connecté par le booléen $connected
if($userObject){
    $connected = true;
}else{
    $connected = false;
}
//Si l'utilisateur est connecté on rentre dans la condition if
if ($connected){

    // On démarre sa session utilisateur
    session_start ();
    $_SESSION['mail']=$mail;
    $_SESSION['mdp_co']=$mdp_co;
    // On stocke le fait qu'il soit connecté dans la variable "usertype" de sa session
    $_SESSION['usertype'] = $connected;
    // On le renvoie vers sa page d'accueil utilisateur
    header("Location: ../index.php");

}
?>