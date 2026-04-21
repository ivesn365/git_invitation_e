<?php 

if(isset($_GET['id'])){
    $id = intval(Query::securisation($_GET['id']));
    $event = Events::afficher2("SELECT * FROM events WHERE id='$id'");
    ?>
     <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modifier evenement</h4>
                <?php
                if(isset($_GET['log'])){
                    if ($_GET['log'] == 'yes'){
                        echo '<div class="alert alert-success">L\'evenement a été créer avec succès. Merci</div>';
                    }elseif ($_GET['log'] == 'no1'){
                        echo '<div class="alert alert-danger">Veuillez vérifier vos informations et l\'extension de la photo svp</div>';
                    }
                    elseif ($_GET['log'] == 'no2'){
                        echo '<div class="alert alert-danger">Veuillez vérifier vos informations et l\'extension de la photo svp</div>';
                    }
                    elseif ($_GET['log'] == 'noFile'){
                        echo '<div class="alert alert-danger">Veuillez télécharger   la photo svp</div>';
                    }
                }


                ?>

                <form class="forms-sample" method="post" action="data.html" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputName1">Nom</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="nom" value="<?=$event->getNom()?>" required placeholder="Nom">
                           <input type="hidden" class="form-control" id="exampleInputName1" name="id" value="<?=$id?>" required placeholder="Nom">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Téléphone</label>
                        <input type="tel" class="form-control" id="exampleInputEmail3" name="phone" value="<?=$event->getTelephone()?>"  required placeholder="Téléphone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Nombre d'invitation</label>
                        <input type="number" class="form-control" id="exampleInputPassword4" name="nbreBillet" value="<?=$event->getNbreBillets()?>" placeholder="Nombre d'invitation">
                    </div>
                    <div class="form-group">
                        <label for="typeEvenement">Type évènement</label>
                        <input type="text" class="form-control" id="typeEvenement" name="typeEvenement" value="<?=$event->getTypeEvent()?>"  placeholder="Type évènement">
                        
                    </div>
            
                    <div class="form-group">
                        <label for="exampleInputCity1">Date</label>
                        <input type="date" class="form-control" id="exampleInputCity1" name="dateDebut" value="<?=$event->getDate()?>" placeholder="Date de début">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Heure</label>
                        <input type="time" class="form-control" id="exampleInputCity1" name="dateFin" value="<?=$event->getDeleteMe()?>" placeholder="Heure">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Salle de l'évènement</label>
                        <input type="text" class="form-control" id="exampleInputCity1" name="lieu" value="<?=$event->getModifieMoi()?>" placeholder="Lieu de l'évènement">
                    </div>
                    
                       <div class="form-group">
                        <label for="commune">Commune</label>
                        <input type="text" class="form-control" id="commune" name="commune" value="<?=$event->getCommune()?>" placeholder="Commune">
                    </div>
                        <div class="form-group">
                        <label for="dateCommune">Date Commune</label>
                        <input type="date" class="form-control" id="dateCommune" name="dateCommune" value="<?=$event->getDateCommune()?>" placeholder="Date Commune">
                    </div>
                       <div class="form-group">
                        <label for="heureCommune">Heure Commune</label>
                        <input type="time" class="form-control" id="heureCommune" name="heureCommune" value="<?=$event->getHeureCommune()?>" placeholder="Heure Commune">
                    </div>
                       <div class="form-group">
                        <label for="heureEglise">Heure eglise</label>
                        <input type="time" class="form-control" id="heureEglise" name="heureEglise" value="<?=$event->getHeureMesse()?>" placeholder="Heure eglise">
                    </div>
                       <div class="form-group">
                        <label for="lieuMesse">Lieu eglise</label>
                        <textarea class="form-control" id="lieuMesse" name="lieuMesse" rows="4"><?=$event->getLieuMesse()?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleTextarea1">Adresse evenement</label>
                        <textarea class="form-control" id="exampleTextarea1" name="adresseEvenement" rows="4"><?=$event->getAdresse()?></textarea>
                    </div>
                     <div class="form-group">
                        <label for="messageEvenement">Message evenement</label>
                        <textarea class="form-control" id="messageEvenement" name="messageEvenement" rows="4"><?=$event->getStatus()?></textarea>
                    </div>
                       <div class="form-group">
                        <label for="mapss">Maps</label>
                        <textarea class="form-control" id="mapss" name="mapss" rows="4"><?=$event->getMessage()?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="btn_update_event">Modifier</button>

                </form>
            </div>
        </div>
    </div>
    
    <?php
}else{ ?>
    
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Nouveau evenement</h4>
                <?php
                if(isset($_GET['log'])){
                    if ($_GET['log'] == 'yes'){
                        echo '<div class="alert alert-success">L\'evenement a été créer avec succès. Merci</div>';
                    }elseif ($_GET['log'] == 'no1'){
                        echo '<div class="alert alert-danger">Veuillez vérifier vos informations et l\'extension de la photo svp</div>';
                    }
                    elseif ($_GET['log'] == 'no2'){
                        echo '<div class="alert alert-danger">Veuillez vérifier vos informations et l\'extension de la photo svp</div>';
                    }
                    elseif ($_GET['log'] == 'noFile'){
                        echo '<div class="alert alert-danger">Veuillez télécharger   la photo svp</div>';
                    }
                }


                ?>

                <form  method="post" action="data.html" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputName1">Nom</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="nom" required placeholder="Nom">
                    </div>
                     <div class="form-group">
                        <label for="exampleInputName1">Nom de la famille</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="titre" required placeholder="Nom de la famille">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Téléphone</label>
                        <input type="tel" class="form-control" id="exampleInputEmail3" name="phone" required placeholder="Téléphone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Nombre d'invitation</label>
                        <input type="number" class="form-control" id="exampleInputPassword4" name="nbreBillet" placeholder="Nombre d'invitation">
                    </div>
                    <div class="form-group">
                        <label for="typeEvenement">Type évènement</label>
                        <input type="text" class="form-control" id="typeEvenement" name="typeEvenement" placeholder="Type évènement">
                        
                    </div>
                  <div class="form-group">
                  <label>Photo principale de l’événement <span class="text-danger">*</span></label>
                  <input type="file" name="photo" class="form-control" required>
                  <small class="text-muted">Image principale (affiche & invitation)</small>
                </div>

                     <div class="form-group">
  <label>Photo secondaire (optionnelle)</label>
  <input type="file" name="photo2" class="form-control" required>
  <small class="text-muted">Image de fond / décoration</small>
</div>

                    <div class="form-group">
                        <label for="exampleInputCity1">Date</label>
                        <input type="date" class="form-control" id="exampleInputCity1" name="dateDebut" placeholder="Date de début">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Heure</label>
                        <input type="time" class="form-control" id="exampleInputCity1" name="dateFin" placeholder="Heure">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Salle de l'évènement</label>
                        <input type="text" class="form-control" id="exampleInputCity1" name="lieu" placeholder="Lieu de l'évènement">
                    </div>
                    
                          <div class="form-group">
                        <label for="commune">Commune</label>
                        <input type="text" class="form-control" id="commune" name="commune"  placeholder="Commune">
                    </div>
                        <div class="form-group">
                        <label for="dateCommune">Date Commune</label>
                        <input type="date" class="form-control" id="dateCommune" name="dateCommune"  placeholder="date Commune">
                    </div>
                       <div class="form-group">
                        <label for="heureCommune">Heure Commune</label>
                        <input type="time" class="form-control" id="heureCommune" name="heureCommune"  placeholder="heure Commune">
                    </div>
                       <div class="form-group">
                        <label for="heureEglise">Heure eglise</label>
                        <input type="time" class="form-control" id="heureEglise" name="heureEglise"  placeholder="Heure eglise">
                    </div>
                    
                           <div class="form-group">
                        <label for="lieuMesse">Lieu eglise</label>
                        <textarea class="form-control" id="lieuMesse" name="lieuMesse" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Adresse evenement</label>
                        <textarea class="form-control" id="exampleTextarea1" name="adresseEvenement" rows="4"></textarea>
                    </div>
                     <div class="form-group">
                        <label for="messageEvenement">Message evenement</label>
                        <textarea class="form-control" id="messageEvenement" name="messageEvenement" rows="4"></textarea>
                    </div>
                       <div class="form-group">
                        <label for="mapss">Maps</label>
                        <textarea class="form-control" id="mapss" name="mapss" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="btn_new_event">Nouveau</button>

                </form>
            </div>
        </div>
    </div>
    <?php
}
    ?>
