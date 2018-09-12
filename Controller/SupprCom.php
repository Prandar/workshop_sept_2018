<?php
if (isset($_GET['idCom']))
{
    include_once ("../Model/model.php");
    $idCom = $_GET['idCom'];

    $result = supprCom($idCom);
    header("Location: ../View/AddCom");
}