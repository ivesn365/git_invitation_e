<?php
$tel = Events::key()->encrypt($_SESSION['pseudo']);
$l = Events::afficher2("SELECT * FROM events WHERE telephone='$tel' AND (date >='$date') ORDER BY id DESC");
$_SESSION['idEvent'] = $l->getId();
$_SESSION['nbre_place'] = $l->getNbreBillets() - Emplacement::getTotalNbrePlace($l->getId());

$id = $l->getId();
?>

<div class="row">
<div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Formulaire de création des tables</h4>
           <div class="alert alert-danger"> Il vous reste <?=$_SESSION['nbre_place']?> places </div>
            <?php
            if (isset($_GET['log'])){
                if ($_GET['log'] == 'no'){ ?>
                    <div class="alert alert-danger"> Veuillez inserer un nombre inférieur ou égal à  <?=$_SESSION['nbre_place']?></div>
            <?php    }
            }
            ?>

            <form class="form-inline" action="data.html" method="post">
                <label class="sr-only" for="inlineFormInputName2">Nom de la table</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="nom" placeholder="Nom de la table">

                <label class="sr-only" for="inlineFormInputGroupUsername2">Nombre des places</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"></div>
                    </div>
                    <input type="number" class="form-control" id="inlineFormInputGroupUsername2" name="nbre_place" placeholder="Nombre des places">
                </div>
                <?php
                if (($l->getNbreBillets() - Emplacement::getTotalNbrePlace($l->getId())) != 0){ ?>
                    <button type="submit" name="btn_add_table" class="btn btn-sm btn-primary">Créer</button>
                    <button type="button" style="margin-left: 5px" disabled name="btn_add_table" class="btn btn-sm btn-success">Continuer</button>
              <?php  }
                else{ ?>
                    <button type="button"  disabled class="btn btn-sm btn-primary">Créer</button>
                    <a href="page-usersAff" style="margin-left: 5px" class="btn btn-sm btn-primary">Continuer</a>
             <?php   }
                ?>

            </form>
        </div>
    </div>
</div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Liste de table</h4>

                <?php
                $query = Emplacement::afficher("SELECT * FROM emplacement WHERE idEvent='$id'");
                if ($query){ ?>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Nom de la table</th>
                                <th>Nombre de place</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($query as $item){ ?>
                                <tr>
                                    <td><?=$item->getNom()?></td>
                                    <td><?=$item->getNbre()?></td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal<?=$item->getId()?>">Modifier</a>
                                        <button class="btn btn-sm btn-danger" onclick="deleteTable(<?=$item->getId()?>)">Supprimer</button>
                                    </td>
                                </tr>

                                <div id="myModal<?=$item->getId()?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"></h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-inline" action="data.html" method="post">
                                                    <label class="sr-only" for="inlineFormInputName2">Nom de la table</label>
                                                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="nom" value="<?=$item->getNom()?>" placeholder="Nom de la table">

                                                    <label class="sr-only" for="inlineFormInputGroupUsername2">Nombre des places</label>
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text"></div>
                                                        </div>
                                                        <input type="hidden" class="form-control" value="<?=$item->getNbre()?>" id="inlineFormInputGroupUsername2" name="nbre_place2" placeholder="Nombre des places">
                                                        <input type="hidden" class="form-control" value="<?=$item->getId()?>" id="inlineFormInputGroupUsername2" name="id" placeholder="Nombre des places">
                                                        <input type="number" class="form-control" value="<?=$item->getNbre()?>" id="inlineFormInputGroupUsername2" name="nbre_place" placeholder="Nombre des places">
                                                    </div>
                                                    <button type="submit" name="btn_update_table" class="btn btn-sm btn-primary">Modifier</button>

                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                       <?php     }
                            ?>


                            </tbody>
                        </table>
                    </div>
           <?php     }else{
                    echo '<div class="alert alert-danger">Aucune table créée pour le moment </div>';
                }

                ?>

            </div>
        </div>
    </div>
</div>
<script>
    function deleteTable(val){
        if (confirm("Voulez-vous supprimer cette table ?")){
            $.ajax({
                url: "data.html",
                method: "POST",
                data: {deleteTable_id: val},
                success: function (data) {
                   location.reload()

                }


            })
        }
    }
</script>