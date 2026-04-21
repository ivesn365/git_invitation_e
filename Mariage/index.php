<?php
require_once('../header.php');


$codeValide = isset($_SESSION['code_ok']) && $_SESSION['code_ok'] === true;

$id = intval(Query::securisation($_SESSION['invite']));
$billet = Billet::afficher2("SELECT * FROM billet WHERE id='$id'");
$event  = Events::afficher2("SELECT * FROM events WHERE id='".$billet->getIdEvent()."'");

$_SESSION['idusersss'] = $billet->getId();
$_SESSION['idEvent']   = $billet->getIdEvent();

/* ===== Dates en lettres ===== */
$jours = ['dimanche','lundi','mardi','mercredi','jeudi','vendredi','samedi'];
$mois  = [1=>'janvier','février','mars','avril','mai','juin','juillet','août','septembre','octobre','novembre','décembre'];

function dateLettre($dateStr, $jours, $mois) {
    $d = new DateTime($dateStr);
    return ucfirst(
        $jours[$d->format('w')] . " " .
        $d->format('d') . " " .
        $mois[(int)$d->format('m')] . " " .
        $d->format('Y')
    );
}

$dateMariage = dateLettre($event->getDate(), $jours, $mois);
$dateCommune = dateLettre($event->getDateCommune(), $jours, $mois);

/* ===== QR CODE ===== */
include('../qrcode/qrlib.php');
QRcode::png(
    Events::key()->encrypt($_SESSION['idusersss']),
    "../docs/qr$id.png"
);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>IHS Event</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Sacramento&family=Work+Sans:wght@300;400;600&display=swap" rel="stylesheet">

<style>

:root{
  --rose-gold:#b76e79;
  --rose-gold-dark:#9e5a63;
  --gold-light:#f7e7ce;
  --text-dark:#3a3a3a;
}

body{
  font-family:'Work Sans',sans-serif;
  background:#f4f4f4;
  color:var(--text-dark);
}

/* ================= HERO ================= */
.hero{
  min-height:100vh;
  background:
    linear-gradient(rgba(0,0,0,.45), rgba(0,0,0,.45)),
    url("../docs/<?= $event->getLogo() ?>") center/cover no-repeat;
}

/* ================= INVITATION CARD ================= */
.invitation-card{
  position: relative; /* 🔥 OBLIGATOIRE */
  max-width:420px;
  margin:auto;
  background:#fff;
  border-radius:10px;
  overflow:hidden;
  box-shadow:0 18px 45px rgba(0,0,0,.18);
}
/* Cover photo */
.invitation-cover{
  height:300px;
  background:url("../docs/<?= $event->getPhoto() ?>") center/cover no-repeat;
  position:relative;
}

/* Overlay rose gold */
.invitation-cover::after{
  content:"";
  position:absolute;
  inset:0;
  background:linear-gradient(
    to bottom,
    rgba(255,255,255,.05),
    rgba(247,231,206,.92)
  );
}

/* Content */
.invitation-content{
  padding:28px;
  text-align:center;
}

.invitation-title{
  font-family:'Sacramento',cursive;
  font-size:42px;
  color:var(--rose-gold);
}

.invitation-text{
  font-size:14px;
  line-height:1.8;
}

.invitation-content hr{
  border:0;
  height:1px;
  margin:18px 0;
  background:linear-gradient(
    to right,
    transparent,
    var(--rose-gold),
    transparent
  );
}

/* Buttons */
.btn-soft{
  border-radius:30px;
  padding:10px 24px;
  font-weight:600;
  color:#fff;
  background:linear-gradient(
    135deg,
    var(--rose-gold),
    var(--rose-gold-dark)
  );
  border:none;
}
.btn-soft:hover{opacity:.9}
/* ================= MOTIFS DECORATIFS ================= */

/* Motif haut gauche */
.invitation-card::before{
  content:"";
  position:absolute;
  top:-40px;
  left:-40px;
  width:140px;
  height:140px;
  background:
    radial-gradient(circle at center,
      rgba(183,110,121,.35) 0%,
      rgba(183,110,121,.15) 40%,
      transparent 70%);
  z-index:0;
}

/* Motif bas droite */
.invitation-card::after{
  content:"";
  position:absolute;
  bottom:-40px;
  right:-40px;
  width:160px;
  height:160px;
  background:
  repeating-radial-gradient(
    circle,
    rgba(183,110,121,.25),
    rgba(183,110,121,.25) 2px,
    transparent 4px,
    transparent 8px
  );

  z-index:0;
}


/* Assure que le contenu passe au-dessus */
.invitation-cover,
.invitation-content{
  position:relative;
  z-index:1;
}
.blur-lock{
  filter: blur(8px);
  pointer-events: none;
}


</style>
</head>

<body>

<!-- ================= HERO ================= -->
<section class="hero d-flex align-items-center justify-content-center text-white text-center">
  <div>
    <h2><?= $event->getNom() ?></h2>
    <p class="mt-2">📅 <?= $dateMariage ?></p>
    <a href="#invitation" onclick="enableScroll()" class="btn btn-light btn-lg mt-3">
      Voir l’invitation
    </a>
  </div>
</section>

<!-- ================= INVITATION ================= -->
<section id="invitation" class="py-5 <?= !$codeValide ? 'blur-lock' : '' ?>">
  <div id="capture-zone" class="invitation-card">

    <div class="invitation-cover"></div>

    <div class="invitation-content">

      <h2 class="invitation-title">Invitation</h2>
        <p class="mt-2" style="font-size:15px;">
    Cher(e)
    <span style="color:var(--rose-gold); font-weight:600;">
      <?= $billet->getNom() ?>
    </span>,
  </p>
 <p class="fw-bold">
      <?= $billet->getNbre() == 1 ? '👤 Singleton' : '👫 Couple'; ?>
    </p>

      <div class="invitation-text">
        <p><strong><?= $event->getTitre() ?></strong></p>
        <p>Ont la joie de vous inviter à l’union de leurs enfants</p>

        <h4 class="fw-bold" style="color:var(--rose-gold)">
          <?= $event->getNom() ?>
        </h4>

        <p>Deux cœurs, une promesse, sous la grâce de Dieu.</p>

        <hr>

        <strong>✨ Mariage civil</strong><br>
        <?= $dateCommune ?><br>
        Heure : <?= $event->getHeureCommune() ?><br>
        <?= $event->getCommune() ?>
        <hr>

        <strong>🤍 Mariage religieux</strong><br>
        <?= $dateMariage ?><br>
        Heure : <?= $event->getHeureMesse() ?><br>
        <?= $event->getLieuMesse() ?>
        
        <hr>
        <strong>🤍 Soirée dansante</strong><br>
        <?= $dateMariage ?><br>
        Heure   : <?= $event->getDeleteMe() ?><br>
        Salle   : <?= $event->getModifieMoi() ?><br>
        <?= $event->getAdresse() ?><br>

     
      </div>

      <img src="../docs/qr<?= $id ?>.png" width="120" class="mt-3">

      <div class="mt-4 d-flex gap-2 justify-content-center">
        <a href="<?= $event->getMessage() ?>" target="_blank" id="mapss"
           class="btn btn-soft">📍 Carte</a>

        <button id="download-btn" class="btn btn-soft">
          ⬇ Télécharger
        </button>
      </div>

    </div>
  </div>
</section>

<!-- ================= LIVRE D’OR ================= -->
<section class="py-5 bg-light">
  <div class="container text-center">
    <h3>📖 Livre d’or</h3>
    <p>Laissez un message aux mariés</p>

    <div id="msg"></div>

    <div class="col-md-5 mx-auto">
      <textarea id="message" class="form-control mb-3" rows="4"
        placeholder="Félicitations pour cette belle union 💖"></textarea>

      <button onclick="sendData()" id="btn_send_data" class="btn btn-soft w-100">
        Envoyer
      </button>

      <button hidden id="load" class="btn btn-soft w-100">
        Envoi...
      </button>
    </div>
  </div>
</section>
<div class="modal fade" id="securityModal" tabindex="-1"
     data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center" style="border-radius:20px">

      <div class="modal-header border-0">
        <h5 class="modal-title w-100" style="color:var(--rose-gold)">
          🔒 Code de sécurité
        </h5>
      </div>

      <div class="modal-body px-4">
        <p>Veuillez saisir votre numéro de téléphone</p>

        <input type="tel" id="securityCode"
               class="form-control text-center"
               placeholder="09XXXXXXXX"
               style="letter-spacing:6px;font-size:20px">

        <div id="securityError"
             class="text-danger mt-2 d-none">
          Numéro de téléphone incorrect
        </div>
      </div>

      <div class="modal-footer border-0">
        <button class="btn btn-soft w-100" onclick="checkCode()">
          Accéder à l’invitation
        </button>
      </div>

    </div>
  </div>
</div>
<footer class="text-center py-3 text-muted">
  &copy; <?= date('Y') ?> IHS-RDC
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
function sendData(){
  let msg=document.getElementById("message").value;
  if(!msg) return;

  $("#btn_send_data").hide();
  $("#load").show();

  $.post("https://event.ihs-rdc.com/data.html",{message_invite:msg},()=>{
    $("#msg").html('<div class="alert alert-success">Message envoyé ❤️</div>');
    $("#btn_send_data").show();
    $("#load").hide();
  });
}

document.getElementById("download-btn").onclick=()=>{
  $("#mapss,#download-btn").hide();
  html2canvas(document.getElementById("capture-zone")).then(canvas=>{
    let a=document.createElement("a");
    a.href=canvas.toDataURL("image/png");
    a.download="<?= $event->getNom() ?>.png";
    a.click();
  });
};

function enableScroll(){
  document.documentElement.style.scrollBehavior="smooth";
}

document.addEventListener("DOMContentLoaded", function () {
  <?php if (!isset($_SESSION['code_ok']) || $_SESSION['code_ok'] !== true): ?>
    const modalElement = document.getElementById('securityModal');
    if (modalElement && typeof bootstrap !== "undefined") {
        new bootstrap.Modal(modalElement, {
          backdrop: 'static',
          keyboard: false
        }).show();
    }
  <?php endif; ?>
});


function checkCode(){
  const code = document.getElementById("securityCode").value;
  const error = document.getElementById("securityError");

  if(!code) return;

  $.post("https://event.ihs-rdc.com/data.html", {code: code}, function(res){
    try{
      const data = JSON.parse(res);

      if(data.status === "ok"){
        bootstrap.Modal.getInstance(
          document.getElementById('securityModal')
        ).hide();
        location.reload();
      } else {
        error.classList.remove("d-none");
      }
    }catch(e){
      error.classList.remove("d-none");
    }
  });
}
</script>


</body>
</html>
