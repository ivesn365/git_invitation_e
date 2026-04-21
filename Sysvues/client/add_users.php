<?php
$tel = Events::key()->encrypt($_SESSION['pseudo']);
$date = date("Y-m-d");
$l = Events::afficher2("SELECT * FROM events WHERE telephone='$tel' AND (date >='$date') ORDER BY id DESC");
$_SESSION['idEvent'] = $l->getId();

$_SESSION['nbre_place'] = $l->getNbreBillets() - Emplacement::getTotalNbrePlace($l->getId());

$id = $l->getId();
//$message = $l->getStatus();
$message = "Une bonne nouvelle à partager… Vous êtes chaleureusement invité(e) à célébrer l'union d' ELIAZER et SALVATRICE"
?>
<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Formulaire d'affectation des invités</h4>

                <?php
                if (isset($_GET['log'])){
                    if ($_GET['log'] == 'no'){ ?>
                        <div class="alert alert-danger"> Veuillez inserer un nombre inférieur ou égal à  <?=$_SESSION['nbre_place']?></div>
                    <?php    }
                }
                ?>

                <form  action="data.html" method="post">
                    <div class="form-group">
                    <label  for="inlineFormInputName2">Nom de l'invité</label>
                    <input type="text" class="form-control" id="inlineFormInputName2" name="nom" placeholder="Nom de l'invité">
                    </div>
                        <div class="form-group">
                    <label  for="inlineFormInputName2">Téléphone de l'invité</label>
                    <input type="tel" class="form-control" id="inlineFormInputName2" name="tel" placeholder="ex. 098756524">
                    </div>
                    <?php
                    if(trim($l->getTypeEvent()) != 'Mariage'){ 
                  
                    
                    ?>
                       <div class="form-group" hidden>
                        <label for="exampleSelectGender">Veuillez selectionner la table</label>
                        <select  class="form-control" id="exampleSelectGender" name="idEmplacement">
                          
                            <?php
                            $query = Emplacement::afficher("SELECT * FROM emplacement WHERE idEvent='$id'");
                            if ($query) {
                                foreach ($query as $item){
                                    $nbre = Billet::nbrePlace($item->getId());
                                    if ($item->getNbre() > $nbre){
                                    ?>
                                    <option value="<?=$item->getId()?>" selected><?=$item->getNom()?>(<?=$item->getNbre() - $nbre ?>)</option>
                             <?php   } }
                            } ?>

                        </select>
                    </div>
                        
                   <?php }else{
                    ?>
                    <div class="form-group">
                        <label for="exampleSelectGender">Veuillez selectionner la table</label>
                        <select  class="form-control" id="exampleSelectGender" name="idEmplacement">
                            <option value="">Veuillez selectionner la table</option>
                            <?php
                            $query = Emplacement::afficher("SELECT * FROM emplacement WHERE idEvent='$id'");
                            if ($query) {
                                foreach ($query as $item){
                                    $nbre = Billet::nbrePlace($item->getId());
                                    if ($item->getNbre() > $nbre){
                                    ?>
                                    <option value="<?=$item->getId()?>"><?=$item->getNom()?>(<?=$item->getNbre() - $nbre ?>)</option>
                             <?php   } }
                            } ?>

                        </select>
                    </div>
                    <?php } ?>
                          <div class="form-group">
                        <label for="exampleSelectGende">Couple/Singleton</label>
                        <select required class="form-control" id="exampleSelectGende" name="niveau">
                             <option value="1" selected>Singleton</option>
                            <option value="2">Couple</option>
                            
                        </select>
                    </div>
                    <button type="submit" name="btn_add_invite" class="btn btn-sm btn-primary">Affecter</button>

                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Liste des personnes</h4>

                <?php
                $query = Billet::afficher("SELECT * FROM billet WHERE idEvent='$id' ORDER BY id DESC");
                if ($query){ ?>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom de la table</th>
                            <th>Nom </th>
                            <th>Status </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $j = 1;
                        foreach ($query as $item){
                            $idEmpl = $item->getIdEmplacement(); ?>
                            <tr>
                                <td><?=$j++?></td>
                                <td><?=Emplacement::toDoList2(Query::CRUD("SELECT * FROM emplacement WHERE id='$idEmpl' ORDER BY id DESC"))->getNom()?></td>
                                <td><?=$item->getNom()?></td>
                                <td><?php 
                                if($item->getStatus() == 2){ 
                                    echo '<span class="badge badge-success">Présent(e)</span>';
                                }
                                else echo '<span class="badge badge-danger">En attente</span>';
                                ?></td>
                                <td>
                                    <a href="https://api.whatsapp.com/send?phone=243<?=substr($item->getTel(),1,10)?>&text=<?=$message?>.Veuillez donc cliquer sur ce lien : event.ihs-rdc.com/ihs-event-invitation et inserer votre numero de telephone (<?=$item->getTel()?>) pour voir et telecharger votre invitation."  class="btn btn-sm btn-success">Envoyer l'invitation</a>
                                   <button style="margin-top: 10px" onclick="annuler(<?=$item->getId()?>)" class="btn btn-sm btn-danger">Retirer</button>
                                   <a href="Mariage/invitation.php?invite=<?=$item->getId()?>">Invitation</a>
                                </td>
                            </tr>



                        <?php     }
                        ?>

                        </tbody>
                    </table>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

</div>
<script>
    function annuler(val){
        if(confirm("Voulez-vous retirer cette invitation")){
                  $.ajax({
                url: "data.html",
                method: "POST",
                data: {
                    annuler_invitation: val
                },
                success: function (data) {
                   location.reload();

                }


            })
            location.reload();
        }
    }
</script>