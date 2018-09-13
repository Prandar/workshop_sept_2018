<?php
/**
 * Created by PhpStorm.
 * User: Prandar
 * Date: 12/09/2018
 * Time: 16:45
 */
?>
<div class="dropdown" style="display: none">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Session
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        <h6 class="dropdown-header"><?=$_SESSION['mail'];?></h6>
        <a class="dropdown-item" href="Controller\logout.php">Déconnexion</a>
    </div>
</div>