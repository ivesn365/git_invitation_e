<?php
$tel = Events::key()->encrypt($_SESSION['pseudo']);
$date = date("Y-m-d");
$l = Events::afficher2("SELECT * FROM events WHERE telephone='$tel' AND (date >='$date') ORDER BY id DESC");
$_SESSION['idEvent'] = $l->getId();
$_SESSION['nbre_place'] = $l->getNbreBillets() - Emplacement::getTotalNbrePlace($l->getId());

$id = $l->getId();

?>
<div class="row">
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card bg-facebook d-flex align-items-center">
            <div class="card-body py-5">
                <div
                        class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">

                    <div class="ml-3 ml-md-0 ml-xl-3">
                        <h5 class="text-white font-weight-bold">Invitations(<?=Emplacement::getTotalNbrePlace($l->getId())?>)</h5>
                        <p class="mt-2 text-white card-text"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card bg-google d-flex align-items-center">
            <div class="card-body py-5">
                <div
                        class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">

                    <div class="ml-3 ml-md-0 ml-xl-3">
                        <h5 class="text-white font-weight-bold">Messages(<?=Query::CRUD("SELECT * FROM `livre_or` WHERE `idEvent`='$id'")->rowCount()?>)</h5>
                        <p class="mt-2 text-white card-text"> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if($_SESSION['roleeeeeeee'] == 'client'){
    
    ?>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card bg-twitter d-flex align-items-center">
            <div class="card-body py-5">
                <div
                        class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">

                    <div class="ml-3 ml-md-0 ml-xl-3">
                        <h5 class="text-white font-weight-bold">Nombre des tables(<?=Query::CRUD("SELECT * FROM emplacement WHERE idEvent='$id'")->rowCount()?>)</h5>
                        <p class="mt-2 text-white card-text"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<div class="row">
    <div class="col-12 col-xl-6 grid-margin stretch-card">
        <div class="row w-100 flex-grow">


        </div>
    </div>
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="row w-100 flex-grow">


        </div>
    </div>
</div>

<!-- row end -->
