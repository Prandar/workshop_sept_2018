<?php
include("Header.php");
include_once ("../Model/model.php");
?>

<div class="row">
    <div class="col-lg-6">
        <form method="POST" action="../Controller/AddCom.php">
            Titre du commentaire :
            <input type="text" name="descriptionCom" required>
            <br>

            <button type="submit">Créer</button>
        </form>

        <!-- On récupère les 5 derniers billets -->
        <?php
        $req = $bdd->query('SELECT id_com, description_com, DATE_FORMAT(date_creation_com, \'%d/%m/%Y à %Hh%imin\') AS date_creation_com FROM com ORDER BY date_creation_com');
        $donnees = $req->fetchAll();
        foreach ($donnees as $event) {
            //commande

            ?>
            <div class="news">
                <h3>
                    <em>le <?php echo $event['date_creation_com']; ?></em>
                </h3>

                <p>
                    <?php
                    // On affiche le contenu du billet
                    echo nl2br(htmlspecialchars($event['description_com']));
                    ?>
                    <form action="../Controller/SupprCom.php" method="get">
                        <input type="hidden" name="idCom" value="<?php echo $event ["id_com"] ?>">
                        <input type="submit" value="Supprimer">
                    </form>

                </p>
            </div>
            <?php
        }
        $req->closeCursor();
        ?>
    </div>
</div>