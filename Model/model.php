<?php
$host = "localhost";
$dbName = "wee";
$login = "root";
$password = "";
$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbName . ';charset=utf8', $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

function getDataBase()
{
    $host = "localhost";
    $dbName = "wee";
    $login = "root";
    $password = "";

    try {
        $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbName . ';charset=utf8', $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        $bdd = null;
        die('Erreur : ' . $e->getMessage());
    }

    return $bdd;
}

function authenticateUser($mail, $mdp_co, PDO $bdd = null)
{

    $user = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    $connect = false;
    if ($bdd) {
        try {
            $stmt = $bdd->prepare("SELECT * FROM compte WHERE mail=:pMail AND mdp_co=:pMdp_co");
            $stmt->bindParam(':pMail', $mail);
            $stmt->bindParam(':pMdp_co', $mdp_co);
            if ($stmt->execute()) {
                $user = $stmt->fetch(PDO::FETCH_OBJ);
                if ($user && $mdp_co == $user->mdp_co) {
                    $connect = true;
                }
            }
        } catch (Exception $e) {
            $connect = false;
        }
    }
    if ($connect) {

        return $user;
    }
    return null;
}

function ajUtilisateur($user_co, $mdp_co, $mail, $promo_co, $ecole)
{
    $newId = null;
    $bdd = getDataBase();
    if ($bdd == null) {
        $bdd = getDataBase();
    }

    // La bd est-elle valide ?
    if (isset($bdd)) {

        try {
            // Insertion dans la bd
            $stmt = $bdd->prepare("INSERT INTO compte (user_co, mdp_co, mail, promo_co, ecole) VALUE( :pUser_co, :pMdp_co, :pMail, :pPromo_co, :pEcole)");
            $stmt->bindParam(':pUser_co', $user_co);
            $stmt->bindParam(':pMdp_co', $mdp_co);
            $stmt->bindParam(':pMail', $mail);
            $stmt->bindParam(':pPromo_co', $promo_co);
            $stmt->bindParam(':pEcole', $ecole);
            var_dump($stmt);
            if ($stmt->execute()) {
                // On récupère l'ID de la commande
                $newId = 1;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
            $newId = 0;
        }
    }
    return $newId;
}


function ajEvent($titre, $description, $date_debut, $date_fin, $lieu)
{
    $newId = null;
    $bdd = getDataBase();
    if ($bdd == null) {
        $bdd = getDataBase();
    }
    // La bd est-elle valide ?
    if (isset($bdd)) {
        try {
            // Insertion dans la bd
            $stmt = $bdd->prepare("INSERT INTO event (titre, description, date_debut, date_fin, lieu) VALUE( :pTitre, :pDescription, :pDate_debut, :pDate_fin, :pLieu)");
            $stmt->bindParam(':pTitre', $titre);
            $stmt->bindParam(':pDescription', $description);
            $stmt->bindParam(':pDate_debut', $date_debut);
            $stmt->bindParam(':pDate_fin', $date_fin);
            $stmt->bindParam(':pLieu', $lieu);
            var_dump($stmt);
            if ($stmt->execute()) {
                // On récupère l'ID de la commande
                $result = 1;
            }
        } catch (Exception $e) {
            //die('Erreur : ' . $e->getMessage());
            $result = 0;
        }
    }
    return $result;
}

function supprEvent($id_e)
{
    $newId = null;
    $bdd = getDataBase();
    if ($bdd == null) {
        $bdd = getDataBase();
    }
    // La bd est-elle valide ?
    if (isset($bdd)) {
        try {
            // Insertion dans la bd
            $stmt = $bdd->prepare("DELETE FROM event WHERE id_e= :pId");
            $stmt->bindParam(':pId', $id_e);

            var_dump($stmt);
            if ($stmt->execute()) {
                // On récupère l'ID de la commande
                $result = 1;
            }
        } catch (Exception $e) {
            //die('Erreur : ' . $e->getMessage());
            $result = 0;
        }
    }
    return $result;
}

function modifEvent($id_e, $titre, $description, $date_debut, $date_fin, $lieu)
{
    $newId = null;
    $bdd = getDataBase();
    if ($bdd == null) {
        $bdd = getDataBase();
    }
    // La bd est-elle valide ?
    if (isset($bdd)) {
        try {
            // Insertion dans la bd
            $stmt = $bdd->prepare("UPDATE event SET title =:pTitle, description=:pDescription, date_debut=:pDate_debut, date_fin=:pDate_fin, lieu=:pLieu WHERE id_e=:pId_e");
            $stmt->bindParam(':pId_e', $id_e);
            $stmt->bindParam(':pTitre', $titre);
            $stmt->bindParam(':pDescription', $description);
            $stmt->bindParam(':pDate_debut', $date_debut);
            $stmt->bindParam(':pDate_fin', $date_fin);
            $stmt->bindParam(':pLieu', $lieu);
            var_dump($stmt);
            if ($stmt->execute()) {
                // On récupère l'ID de la commande
                $result = 1;
            }
        } catch (Exception $e) {
            //die('Erreur : ' . $e->getMessage());
            $result = 0;
        }
    }
    return $result;
}

function returnEvent($id_e)
{
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    // La bd est-elle valide ?
    if ($bdd) {
        $resultat = $bdd->query("SELECT titre, date_debut FROM event, participe, compte WHERE id_e=.$id_e. = ");
        if ($resultat) {
            $event = $resultat->fetchAll(PDO::FETCH_OBJ);
            // Fermeture de la ressource
            $resultat->closeCursor();
        }
    }
    return $event;
}


function ajCom($descriptionCom)
{
    $newId = null;
    $bdd = getDataBase();
    if ($bdd == null) {
        $bdd = getDataBase();
    }
    // La bd est-elle valide ?
    if (isset($bdd)) {
        try {
            // Insertion dans la bd
            $stmt = $bdd->prepare("INSERT INTO com (description_com) VALUE( :pDescription_com)");
            $stmt->bindParam(':pDescription_com', $descriptionCom);
            var_dump($stmt);
            if ($stmt->execute()) {
                // On récupère l'ID de la commande
                $result = 1;
            }
        } catch (Exception $e) {
            //die('Erreur : ' . $e->getMessage());
            $result = 0;
        }
    }
    return $result;
}

function supprCom($idCom)
{
    $newId = null;
    $bdd = getDataBase();
    if ($bdd == null) {
        $bdd = getDataBase();
    }
    // La bd est-elle valide ?
    if (isset($bdd)) {
        try {
            // Insertion dans la bd
            $stmt = $bdd->prepare("DELETE FROM com WHERE id_com = :pId_com");
            $stmt->bindParam(':pId_com', $idCom);

            var_dump($stmt);
            if ($stmt->execute()) {
                // On récupère l'ID de la commande
                $result = 1;
            }
        } catch (Exception $e) {
            //die('Erreur : ' . $e->getMessage());
            $result = 0;
        }
    }
    return $result;
}

function Event_to_JSON()
{
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    // La bd est-elle valide ?
    if ($bdd) {
        // Obtention de la liste des pays
        $resultat = $bdd->query("SELECT * FROM event");
        if ($resultat) {
            $events = $resultat->fetchAll(PDO::FETCH_OBJ);
            // Fermeture de la ressource
            $resultat->closeCursor();
            //var_dump ($events);
            header('Content-Type: application/json');
            echo (json_encode($events));
        }
    }
}

function Comment_to_JSON($id_event)
{
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    // La bd est-elle valide ?
    if ($bdd) {
        // Obtention de la liste des pays
        $resultat = $bdd->query("SELECT * FROM evcom WHERE id_e=$id_event");
        if ($resultat) {
            $events = $resultat->fetchAll(PDO::FETCH_OBJ);
            // Fermeture de la ressource
            $resultat->closeCursor();
            //var_dump ($events);
            header('Content-Type: application/json');
            echo (json_encode($events));
        }
    }
}

function ajParticipe($id_co, $id_e)
{
    $newId = null;
    $bdd = getDataBase();
    if ($bdd == null) {
        $bdd = getDataBase();
    }
    // La bd est-elle valide ?
    if (isset($bdd)) {
        try {
            // Insertion dans la bd
            $stmt = $bdd->prepare("INSERT INTO participe (id_co, id_e) VALUE (:pId_co, :pId_e)");
            $stmt->bindParam(':pId_co', $id_co);
            $stmt->bindParam(':pId_e', $id_e);
            var_dump($stmt);
            if ($stmt->execute()) {
                // On récupère l'ID de la commande
                $result = 1;
            }

        } catch (Exception $e) {
            //die('Erreur : ' . $e->getMessage());
            $result = 0;
        }
    }
    return $result;
}

function SupprParticipe($id_e)
{
    $newId = null;
    $bdd = getDataBase();
    if ($bdd == null) {
        $bdd = getDataBase();
    }
    // La bd est-elle valide ?
    if (isset($bdd)) {

            // Insertion dans la bd
            $stmt = $bdd->prepare("DELETE FROM participe WHERE id_e = :pId_e");
            $stmt->bindParam(':pId_e', $id_e);
            var_dump($stmt);
            if ($stmt->execute()) {
                // On récupère l'ID de la commande
                $result = 1;
            }
            try {
        } catch (Exception $e) {
            //die('Erreur : ' . $e->getMessage());
            $result = 0;
        }
    }
    return $result;
}

function verifParticipe ($id_co){
    $newId = null;
    $bdd = getDataBase();
    if ($bdd == null) {
        $bdd = getDataBase();
    }
    // La bd est-elle valide ?
    if (isset($bdd)) {
        try {
            // Insertion dans la bd
            $stmt = $bdd->prepare("SELECT id_co FROM participe WHERE id_co = :pId_co");
            $stmt->bindParam(':pId_co', $id_co);
            if ($id_co) {
                return true;
            }else{
                return false;
            }
        } catch (Exception $e) {
            //die('Erreur : ' . $e->getMessage());
            $result = 0;
        }
    }
    return $result;
}