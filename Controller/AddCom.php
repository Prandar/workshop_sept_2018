<?php
include_once  ("../Model/model.php");

if (isset($_POST['descriptionCom']) )
{
    $descriptionCom = $_POST['descriptionCom'];
    $result = ajCom($descriptionCom);

    header("Location: ../View/AddCom");
}