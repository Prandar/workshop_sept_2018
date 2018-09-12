<?php

include_once ("../Model/model.php");

if (isset($_POST['user_co']) )
{
    $user_co = $_POST['user_co'];
    $mdp_co = $_POST['mdp_co'];
    $mail = $_POST['mail'];
    $promo_co = $_POST['promo_co'];
    $ecole = $_POST['ecole'];
    $result = ajUtilisateur($user_co, $mdp_co, $mail, $promo_co, $ecole);
    header("Location: /index.php");
}