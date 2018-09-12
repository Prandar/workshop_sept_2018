<?php
include_once("../Model/model.php");
$event = returnEvent($_GET['id_e']);

?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-1">

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-10">

            <p> <?=$event ["3"]->titre;?></p>
            <p> Description : <?=$event ['3']->description;?></p>
            <p> Date creation : <?=$event ['3']->date_creation;?></p>
            <p> Date debut : <?=$event ['3']->date_debut;?></p>
            <p> Date fin : <?=$event ['3']->date_fin;?></p>
            <p> Lieu : <?=$event ['3']->lieu;?></p>

        </div>
        <!-- /.col-lg-9 -->
        <div class="col-lg-1">

        </div>

    </div>
</div>

