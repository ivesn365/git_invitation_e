<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Évènements</h4>
        <?php
        $tab = Events::afficher("SELECT * FROM events ORDER BY id DESC");
        if ($tab){

        ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Nom
                        </th>
                        <th>
                            Progress
                        </th>
                        <th>
                            Téléphone
                        </th>
                        <th>
                            Adresse
                        </th>
                        <th>
                            Nombre d'invitation
                        </th>
                        <th>
                            Date de début & fin
                        </th>
                        <th>
                            Type évènement
                        </th>
                           <th>
                            Message
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $j = 1;
                    foreach ($tab as $i){


                    ?>
                    <tr>
                        <td class="py-1">
                          <?=$j++?>
                        </td>
                        <td>
                            <?=$i->getNom()?>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                        <td>
                            <?=$i->getTelephone()?>
                        </td>
                        <td>
                            <?=$i->getAdresse()?>
                        </td>
                        <td>
                            <?=$i->getNbreBillets()?>
                        </td>
                        <td>
                            <?=$i->getDate()?><br><?=$i->getDeleteMe()?>
                        </td>

                        <td>
                            <?=$i->getTypeEvent()?>
                        </td>
                         <td>
                            <?=$i->getMessage()?>
                        </td>
                        <td>
                            <a href="detail-formEvent-<?=$i->getId()?>" class="btn btn-info btn-sm">Modifier</a>
                                 <a style="margin-bottom: 10px;float: right" href="print-<?=$i->getId()?>-livre-or.html" class="btn btn-sm btn-info">Imprimer</a><br>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>

                    </tbody>
                </table>
            </div>
            <?php
        }else{
            echo '<div class="alert alert-danger">Aucune information enregistrée pour le moment</div>';
        }

            ?>
        </div>
    </div>
</div>