<?php
require ('../header.php');


if (!isset($_SESSION['ip'])) {
    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
} 

if ($_SESSION['ip'] == $_SERVER['REMOTE_ADDR']) {


$extensionsPhoto = array('.png', '.gif', '.jpg', '.jpeg', '.JPG', '.JPEG', '.PNG');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['pseudo_connexion'])) {
        $pseudo = Users::key()->encrypt(Query::securisation($_POST['pseudo_connexion']));
        $password = md5(Query::securisation($_POST['password_connexion']));
        $users = Users::afficher2("SELECT * FROM `usersss` WHERE `pseudo`='$pseudo' AND `password`='$password' ORDER BY id DESC LIMIT 1");
        if ($users->getId()) {

            $_SESSION['iddddddddddddddddddd'] = $users->getId();
            $_SESSION['pseudo'] = $users->getPseudo();
            $_SESSION['roleeeeeeee'] = trim($users->getRole());
            if (Query::securisation($_POST['password_connexion']) == 'event-12345'){
                echo '2';
            }else{
                if($_SESSION['roleeeeeeee'] == 'invite'){
                    $tel = Billet::key()->encrypt($_SESSION['pseudo']);
                    $date = date("Y-m-d");
                    $_SESSION['invite'] = Billet::afficher2("SELECT * FROM billet WHERE tel='$tel' AND idEvent IN (SELECT id FROM events WHERE (date >='$date')) ORDER BY id DESC LIMIT 1")->getId();
                    echo '4';
                }
                else echo "1";
            }

        } else {
            echo "3";
        }

    }
    
    if (isset($_POST['code'])) {

        $codeSaisi = Query::securisation($_POST['code']);
        $tel = Billet::key()->encrypt($codeSaisi);
        $date = date("Y-m-d");
        $codeDB = Billet::afficher2("SELECT * FROM billet WHERE tel='$tel' AND idEvent IN (SELECT id FROM events WHERE (date >='$date')) ORDER BY id DESC LIMIT 1")->getId();
        
        if ($codeDB) {
            $_SESSION['invite'] = $codeDB;
            $_SESSION['code_ok'] = true;
            echo json_encode(['status' => 'ok']);
        } else {
            echo json_encode(['status' => 'invalid']);
        }
    }

    if (isset($_POST['password_connexion_update'])){
        $id = $_SESSION['iddddddddddddddddddd'];
        $password = md5(Query::securisation($_POST['password_connexion_update']));
        Query::CRUD("UPDATE usersss SET  `password`='$password' WHERE id='$id'");
        echo "1";
    }

    if (isset($_POST['btn_new_event'])){
        $key = Events::key();
        $nom = $key->encrypt(Query::securisation($_POST['nom']));
        $phone = $key->encrypt(Query::securisation($_POST['phone']));
        $typeEvenement = $key->encrypt(Query::securisation($_POST['typeEvenement']));
        $adresseEvenement = $key->encrypt(Query::securisation($_POST['adresseEvenement']));
        $nbreBillet = intval(Query::securisation($_POST['nbreBillet']));
        $dateDebut = Query::securisation($_POST['dateDebut']);
        $dateFin = $key->encrypt(Query::securisation($_POST['dateFin']));
        $lieu = $key->encrypt(Query::securisation($_POST['lieu']));
        $mapss = $key->encrypt(Query::securisation($_POST['mapss']));
          $lieu = $key->encrypt(Query::securisation($_POST['lieu']));
        $commune = $key->encrypt(Query::securisation($_POST['commune']));
         $dateCommune = $key->encrypt(Query::securisation($_POST['dateCommune']));
          $heureCommune = $key->encrypt(Query::securisation($_POST['heureCommune']));
           $heureEglise = $key->encrypt(Query::securisation($_POST['heureEglise']));
           $titre = $key->encrypt(Query::securisation($_POST['titre']));
        
        $messageEvenement = $key->encrypt(Query::securisation($_POST['messageEvenement']));
        
        $type = "";
        if(Query::securisation($_POST['typeEvenement']) == 'Mariage'){
            $type = Users::key()->encrypt("client");
            
        }else{
           $type = Users::key()->encrypt("Autre");  
           
        }


        if (isset($_FILES)) {
         /* ===== PHOTO 1 ===== */
    $extensionP = strtolower(strrchr($_FILES['photo']['name'], '.'));
    $rename  = time() . $extensionP;
    $tmp1 = $_FILES['photo']['tmp_name'];
    $dest1 = '../docs/' . $rename;
    
    /* ===== PHOTO 2 ===== */
    $extensionP2 = strtolower(strrchr($_FILES['photo2']['name'], '.'));
    $rename2 = time() . $extensionP2;
    $tmp2 = $_FILES['photo2']['tmp_name'];
    $dest2 = '../docs/' . $rename2; 
 
    /* ===== EXTENSIONS ===== */
    if (
        in_array($extensionP, $extensionsPhoto) &&
        in_array($extensionP2, $extensionsPhoto)
    ) {

        if (move_uploaded_file($tmp1, $dest1) && move_uploaded_file($tmp2, $dest2)) {
                    (new Events(null, $nom, $key->encrypt($rename), $typeEvenement, $nbreBillet, $dateDebut, $adresseEvenement, $phone, $lieu, $dateFin,$messageEvenement,$mapss,$commune,$dateCommune,$heureCommune,$heureEglise, $lieu, $titre, $key->encrypt($rename2)))->ajouter();
                   (new Users(null, Users::key()->encrypt(Query::securisation($_POST['phone'])), md5("event-12345"), $type, 1))->ajouter();
                   
            if(Query::securisation($_POST['typeEvenement']) == 'Autre'){
              $noms = Emplacement::key()->encrypt("-");
       (new Emplacement(null, $noms, Events::afficher2("SELECT * FROM events ORDER BY id DESC LIMIT 1")->getId(), $nbreBillet, null, 1))->ajouter();
        }
                   
                   
                   
                   header("Location:form-formEvent-yes");
                }
                else{
                    header("Location:form-formEvent-no1");
                }
            }
            else{
                header("Location:form-formEvent-no2");
            }
        }
        else{
            header("Location:form-formEvent-noFile");
        }


    }
      if (isset($_POST['btn_update_event'])){
        $key = Events::key();
        $nom = $key->encrypt(Query::securisation($_POST['nom']));
        $phone = $key->encrypt(Query::securisation($_POST['phone']));
        $typeEvenement = $key->encrypt(Query::securisation($_POST['typeEvenement']));
        $adresseEvenement = $key->encrypt(Query::securisation($_POST['adresseEvenement']));
        $nbreBillet = intval(Query::securisation($_POST['nbreBillet']));
        $dateDebut = Query::securisation($_POST['dateDebut']);
        $dateFin = $key->encrypt(Query::securisation($_POST['dateFin']));
        $lieu = $key->encrypt(Query::securisation($_POST['lieu']));
        $mapss = $key->encrypt(Query::securisation($_POST['mapss']));
        $lieuMesse = $key->encrypt(Query::securisation($_POST['lieuMesse']));
        
        $commune = $key->encrypt(Query::securisation($_POST['commune']));
         $dateCommune = $key->encrypt(Query::securisation($_POST['dateCommune']));
          $heureCommune = $key->encrypt(Query::securisation($_POST['heureCommune']));
           $heureEglise = $key->encrypt(Query::securisation($_POST['heureEglise']));
        
        $messageEvenement = (Query::securisation($_POST['messageEvenement']));
             $id = intval(Query::securisation($_POST['id']));
        $type = "";
        if(Query::securisation($_POST['typeEvenement']) == 'Mariage'){
            $type = Users::key()->encrypt("client");
            
        }else{
           $type = Users::key()->encrypt("Autre");  
           
        }

        Query::CRUD("UPDATE `events` SET `nom`='$nom',`typeEvent`='$typeEvenement',`nbreBillets`='$nbreBillet',`date`='$dateDebut',`adresse`='$adresseEvenement',`telephone`='$phone',`modifie_moi`='$lieu',`delete_me`='$dateFin',`status`='$messageEvenement',`message`='$mapss',`commune`='$commune',`dateCommune`='$dateCommune',`heureCommune`='$heureCommune',`heureMesse`='$heureEglise',lieuMesse='$lieuMesse' WHERE id='$id'");

       
     header("Location:page-afficherEvent");


    }

    if (isset($_POST['btn_add_table'])){
        $nom = Emplacement::key()->encrypt(Query::securisation($_POST['nom']));
        $nbre = intval(Query::securisation($_POST['nbre_place']));
       if ($_SESSION['nbre_place'] >= $nbre){
            (new Emplacement(null, $nom, $_SESSION['idEvent'], $nbre, null, 1))->ajouter();
            header("Location:page-formTable");
        }else{
            header("Location:form-formTable-no");
        }

    }
    if (isset($_POST['btn_update_table'])){
        $nom = Emplacement::key()->encrypt(Query::securisation($_POST['nom']));
        $nbre = intval(Query::securisation($_POST['nbre_place']));
        $nbre2 = intval(Query::securisation($_POST['nbre_place2']));
        $id = intval(Query::securisation($_POST['id']));
       if ($nbre2 >= $nbre){
           Query::CRUD("UPDATE `emplacement` SET `nom`='$nom',`nbre`='$nbre' WHERE `id`='$id'");
            header("Location:page-formTable");
        }
       elseif  ($_SESSION['nbre_place'] >= abs($nbre - $nbre2)){
           Query::CRUD("UPDATE `emplacement` SET `nom`='$nom',`nbre`='$nbre' WHERE `id`='$id'");
           header("Location:page-formTable");
       }
       else{
            header("Location:form-formTable-no");
        }

    }

    if (isset($_POST['deleteTable_id'])){
        $deleteTable_id = intval(Query::securisation($_POST['deleteTable_id']));
        Query::CRUD("DELETE FROM emplacement WHERE id='$deleteTable_id'");
        echo 'succesfull';
    }

    if (isset($_POST['btn_add_invite'])){
        $nom = Billet::key()->encrypt(Query::securisation($_POST['nom']));
        $idEmplacement = intval(Query::securisation($_POST['idEmplacement']));
         $niveau = intval(Query::securisation($_POST['niveau']));
        $idEvent = $_SESSION['idEvent'];
       $motdepasse = rand(10000,100000);
       (new Billet(null, $nom, $idEvent, null, 1, $idEmplacement,$niveau,Billet::key()->encrypt(trim(Query::securisation($_POST['tel']))),Billet::key()->encrypt($motdepasse)))->ajouter();
       
        $role = Users::key()->encrypt("invite");
        $tel = Users::key()->encrypt(Query::securisation($_POST['tel']));
        
        (new Users(null, $tel, md5($motdepasse), $role, 1))->ajouter();
       header("Location:page-usersAff");
    }
    if (isset($_POST['message_invite'])){
        $message = Events::key()->encrypt(Query::securisation($_POST['message_invite']));
        $idusers = $_SESSION['idusersss'];
        $idEvent = $_SESSION['idEvent'];
        (new Livre_or(null, $idusers, $idEvent, $message, null, 1))->ajouter();
        echo "Succesfull";
    }
    
    

    if (isset($_POST['info_invitation'])){
        $date = date("Y-m-d");
        $info_invitation = intval(Events::key()->decrypt(Query::securisation($_POST['info_invitation'])));
        $billet = Billet::afficher2("SELECT * FROM billet WHERE id='$info_invitation'")->getNom();
        $ss = Billet::afficher2("SELECT * FROM billet WHERE id='$info_invitation' AND idEvent IN (SELECT id FROM events WHERE (date >='$date'))")->getStatus();
            $emp = Emplacement::toDoList2(Query::CRUD("SELECT * FROM `emplacement` WHERE `id` IN (SELECT idEmplacement FROM billet WHERE id='$info_invitation')"))->getNom();
        if($ss == 1){
            Query::CRUD("UPDATE billet SET status=2 WHERE id='$info_invitation'");
    
        echo '<h1>M/Mme/Couple <strong>'.$billet.'</strong></h1><br><p>Table : '.$emp.'</p>';
        }else{
            echo '<h1 style="color:red">Danger le code a été déjà scanner</h1><br><h1>M/Mme/Couple <strong>'.$billet.'</strong></h1><br><p>Table : '.$emp.'</p>';;
        }
    }
    
    if(isset($_POST['annuler_invitation'])){
         $id = intval(Query::securisation($_POST['annuler_invitation']));
         Query::CRUD("DELETE FROM billet WHERE id='$id'");
         echo 'ook';
    }
    
    if(isset($_POST['dolwQRS'])){
        include('../qrcode/qrlib.php');

QRcode::png($_SESSION['idusersss'],  '../docs/qr.png');

 header('Content-Type: application/octet-stream');
    header('Content-Length: '. 1000);
    header('Content-disposition: attachment; filename='. Query::securisation($_POST['dolwQRS']).'.png');
    header('Pragma: no-cache');
    header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    header('Expires: 0');
    readfile('../docs/qr.png');
    }
}
elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['dec'])){
        session_destroy();
        header("Location:login.html");
    }

    if (isset($_GET['validerInvitation'])){
        $validerInvitation = intval(Query::securisation($_GET['validerInvitation']));
        $idEvent = $_SESSION['idEvent'];
        Query::CRUD("INSERT INTO `modelInvitation`(`idEvent`, `idModel`, `status`) VALUES ('$idEvent','$validerInvitation','1')");
        header("Location:page-formTable");
    }
        if(isset($_GET['dolwQRS'])){
        include('../qrcode/qrlib.php');

QRcode::png($_SESSION['idusersss'],  '../docs/qr.png');

 header('Content-Type: application/octet-stream');
    header('Content-Length: '. 1000);
    header('Content-disposition: attachment; filename='. Query::securisation($_GET['dolwQRS']).'.png');
    header('Pragma: no-cache');
    header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    header('Expires: 0');
    readfile('../docs/qr.png');
    }
}
}else{
    session_destroy();
      header("Location:form-formEvent-noFile");
}

