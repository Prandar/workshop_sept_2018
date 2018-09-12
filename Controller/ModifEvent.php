<?php

if (isset($_POST['titre']) )
{
    include_once  ("../Model/model.php");
    $id_e = $_POST['id_e'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $lieu = $_POST['lieu'];

    $result = modifEvent($id_e,$titre, $description, $date_debut, $date_fin, $lieu);

    header("Location: ../View/AddEvent");
}