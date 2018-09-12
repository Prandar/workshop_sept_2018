<?php
include("Header.php");
include_once ("../Model/model.php");
?>
<?php
$req = $bdd->query('SELECT id_e, titre, description, date_debut, date_fin, lieu  FROM event');
$donnee = $req->fetch();

?>
<form method="POST" action="../Controller/AddEvent.php">
    <input type="hidden" name="id_e" value="<?php echo $donnee['id_e'];?>">
            Titre de l'événement :
            <input type="text" name="titre" value="<?php echo ($donnee['titre'])?>" required>
            <br>
            Description :
            <input type="text" name="description" value="<?php echo ($donnee['description'])?>" required>
            <br>
            Date de debut :
            <input type="date" name="date_debut" value="<?php echo ($donnee['date_debut'])?>" required>
            <br>
            Date de fin :
            <input type="date" name="date_fin" value="<?php echo ($donnee['date_fin'])?>" required>
            <br>
            lieu :
            <input type="text" name="lieu" value="<?php echo ($donnee['lieu'])?>" required>
            <br>
            <button type="submit">Créer</button>
</form>
    <?php
    $req = $bdd->query('SELECT id_e, titre, description, DATE_FORMAT (date_creation, \'%d/%m/%Y à %Hh%imin\') AS date_creation, date_debut, date_fin, lieu  FROM event ORDER BY date_creation');
    $event = $req->fetchAll();
    foreach ($event as $donnee)
    {
        ?>


        <div class="news">
            <h3>
                <em>le <?php echo $donnee['date_creation']; ?></em>
            </h3>

            <p>
                <?php
                echo nl2br(htmlspecialchars($donnee['titre']));
                ?> <br><br>
                <?php
                echo nl2br(htmlspecialchars($donnee['description']));
                ?><br><br>
                <?php
                echo nl2br(htmlspecialchars($donnee['date_debut']));
                ?><br>
                <?php
                echo nl2br(htmlspecialchars($donnee['date_fin']));
                ?><br><br>
                <?php
                echo nl2br(htmlspecialchars($donnee['lieu']));
                ?><br><br>
            </p>
            <form action="../Controller/SuppEvent.php" method="get">
                <input type="hidden" name="id_e" value="<?php echo $donnee['id_e'];?>">
                <input type="submit" value="supprimer">
            </form>
            <form action="../Controller/ModifEvent.php" method="POST">
                <input type="hidden" name="id_e" value="<?php echo $donnee['id_e'];?>">
                <input type="submit" value="modifer">
            </form>
        </div>
        <?php
    }
    $req->closeCursor();
    ?>
