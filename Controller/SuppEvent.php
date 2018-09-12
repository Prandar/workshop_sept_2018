<?php

if (isset($_GET['id_e']) )
{
    include_once  ("../Model/model.php");
    $id_e = $_GET['id_e'];

    $result = supprEvent($id_e);

    header("Location: ../View/AddEvent");
}