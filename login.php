<?php
    include_once("View/Header.php");
    if (isset($error) && $error == 1) {
?>
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    L'identifiant ou le mot de passe est incorrect.
</div>
<?php
}
?>
<div class="container-fluid" id="logo_container" style="color: white;">
    <div class="row">
        <h1 style="color: white; background-color: rgba(0,0,0,0.3);"> Rejoins la communauté !</h1>
    </div>
    <div class="row" style="padding-bottom: 37vh">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6 form">
            <form action="Controller/login.php" method="POST">
                <div class="form-group">
                    <label for="mail">Mail</label>
                    <input type="text" class="form-control" name="mail" placeholder="Entrez votre mail"/>
                </div>
                <label for="mdp_co">Mot de passe </label>
                <input type="text" class="form-control" name="mdp_co" placeholder="Entrez votre mot de passe"/>
                <br>
                <input type="submit" value="se connecter" class="btn btn-primary sub"/>

            </form>
        </div>
        <div class="col-lg-3">
        </div>
    </div>


</div>

