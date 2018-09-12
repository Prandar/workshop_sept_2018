<?php
include_once  ("../Model/model.php");

if (isset($_POST['titre']) )
{
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $lieu = $_POST['lieu'];

    $result = ajEvent($titre, $description, $date_debut, $date_fin, $lieu);

    header("Location: ../View/AddEvent");
}