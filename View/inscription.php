<!DOCTYPE html>
<html>
<head>
    <title>S'inscrire</title>

</head>

<body>
<div class="row">

    <div class="col-lg-6">
        <h2>S'inscrire</h2>

        <form action="../Controller/inscription.php" method="POST"><br>
            <!--Nom et mdp-->

            <label>Nom</label>
            <input type="text" name="user_co" required> <br><br>

            <label>Mot de passe</label>
            <input type="text" name="mdp_co" required> <br><br>

            <label>E-mail</label>
            <input type="text" name="mail" required> <br><br>

            <label>Promo</label>
            <input type="text" name="promo_co" required> <br><br>

            <label>Ecole</label>
            <input type="text" name="ecole" required> <br><br>

            <!-- Bouton envoyer formulaire -->
            <button type="submit" >S'inscrire</button>
        </form>
    </div>

</div>

<br>
<br>
</body>
</html>