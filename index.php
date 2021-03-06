<?php
include 'view/header.php';
include_once ("Model/model.php");

if (!isset($_SESSION['mail']) && empty($_SESSION['mail'])) {
    header('Location: login.php');
}
?>
<div id="sub_bar" class="row">
    <div class="col-2"></div>
    <div class="col-1">
        <button type="button" id="filtre_cinema" class="btn filtre cinema" onclick="filtre_act('filtre_cinema')">Cinéma</button>
    </div>
    <div class="col-1">
        <button type="button" id="filtre_sport" class="btn filtre sport" onclick="filtre_act('filtre_sport')">Sport</button>
    </div>
    <div class="col-1">
        <button type="button" id="filtre_culture" class="btn filtre culture" onclick="filtre_act('filtre_culture')">Culture</button>
    </div>
    <div class="col-1">
        <button type="button" id="filtre_loisir" class="btn filtre loisir" onclick="filtre_act('filtre_loisir')">Loisir</button>
    </div>
    <div class="col-1">
        <button type="button" id="filtre_musique" class="btn filtre musique" onclick="filtre_act('filtre_musique')">Musique</button>
    </div>
    <div class="col-1">
        <button type="button" id="filtre_soiree" class="btn filtre soiree" onclick="filtre_act('filtre_soiree')">Soirée</button>
    </div>
    <div class="col-1">
        <button type="button" id="filtre_autre" class="btn filtre autre" onclick="filtre_act('filtre_autre')">Autre</button>
    </div>
    <div class="col-1">
        <button type="button" class="btn filtre" data-toggle="modal" data-target="#EVENT_Modal">Creer</button>
    </div>
    <div class="col-2"></div>
</div>
<div id="content" class="row">
    <div id="content_left" class="col-2">
        a venir
        <div class="row grey_back">a</div>
        <div class="row grey_back">b</div>
        <div class="row grey_back">c</div>
    </div>
    <div id="content_center" class="col-8">
        <div class="row">
            <section id="timeline">
            </section>
        </div>
    </div>
    <div id="content_right" class="col-2">
        calendrier
        <div class="row grey_back">d</div>
        Tendence
        <div class="row grey_back">e</div>
        <div class="row grey_back">f</div>
        <div class="row grey_back">g</div>

    </div>
</div>
<!-- DEB Modal_event -->
<div class="modal fade" id="EVENT_Modal" tabindex="-1" role="dialog" aria-labelledby="EVENT_ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EVENT_ModalLabel">Creer event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="index.php" method="post" id="New_event">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Titre de l'évenement</span>
                        </div>
                        <input id="NE_input_titre" type="text" class="form-control">
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Date du début de l'évenement</span>
                        </div>
                        <input id="NE_input_date_deb" type="text" class="form-control datepicker" onfocus="showdatepicker('NE_input_date_deb')">
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Date de fin de l'évenement</span>
                        </div>
                        <input id="NE_input_date_fin" type="text" class="form-control datepicker" onclick="showdatepicker('NE_input_date_fin')">
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Description de l'évenement</span>
                        </div>
                        <textarea id="NE_input_description" class="form-control"></textarea>
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Lieu de l'évenement</span>
                        </div>
                        <input id="NE_input_lieu" type="text" class="form-control">
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Catégorie de l'évenement</span>
                        </div>
                        <select id="NE_input_categorie" class="form-control">
                            <?php
                                $req = $bdd->query('SELECT id_cat,libeller FROM categorie');
                                $donnees = $req->fetchAll();

                                foreach ($donnees as $event) {
                                    echo "<option value=".$event['id_cat'].">". $event['libeller']."</option>";
                                }

                                $req->closeCursor();
                            ?>
                        </select>
                        <br>
                        <input type="submit" value="Submit" class="btn" onclick="actualiser_timeline()">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>
<!--FIN Modal_event-->
<!--DEB modal comment-->
<div class="modal fade" id="comment_Modal" tabindex="-1" role="dialog" aria-labelledby="comment_ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="comment_ModalLabel">Titre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="comment_Modal_body" class="modal-body">
                Contenue
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary">Envoyer commentaire</button>
            </div>
        </div>
    </div>
</div>
<!--FIN modal comment-->
</body>
</html>