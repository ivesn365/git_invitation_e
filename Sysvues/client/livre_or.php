<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
<?php
    $idEvent = $_SESSION['idEvent'];
    $tel = Events::key()->encrypt($_SESSION['pseudo']);
$date = date("Y-m-d");
$l = Events::afficher2("SELECT * FROM events WHERE telephone='$tel' AND (date >='$date') ORDER BY id DESC");
$_SESSION['idEvent'] = $l->getId();
$_SESSION['nbre_place'] = $l->getNbreBillets() - Emplacement::getTotalNbrePlace($l->getId());

$id = $l->getId();
    $livre = Livre_or::afficher("SELECT * FROM `livre_or` WHERE `idEvent`='$id'");
    

    if ($livre){ ?>
        <h4 class="card-title">Livre d'or</h4>
        <a style="margin-bottom: 10px;float: right" href="print-livre-or.html" class="btn btn-sm btn-info">Imprimer</a><br>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Date</th>
                    <th>Message</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $j = 1;
                foreach ($livre as $item){
                    $idB = $item->getIdusers();
                    ?>
                    <tr>
                        <td><?=$j++?></td>
                        <td><?=ucfirst(Billet::afficher2("SELECT * FROM `billet` WHERE `id`='$idB'")->getNom())?></td>
                        <td><?=$item->getDate()?></td>
                        <td><?=$item->getMessage()?></td>
                    </tr>

            <?php    }

                ?>

                </tbody>
            </table>
        </div>

 <?php
    }
    else{
        echo '<div class="alert alert-danger">Aucune information disponible pour le moment</div>';
    }

?>



            </div>
        </div>
    </div>
</div>