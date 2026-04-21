<?php
  require_once ('../header.php');
  
 
    if (isset($_GET['invite'])){
        $id = (intval(Query::securisation($_GET['invite'])));
        $billet = Billet::afficher2("SELECT * FROM billet WHERE id='$id'");
        $idEvent = $billet->getIdEvent();
        $event = Events::afficher2("SELECT * FROM events WHERE id='$idEvent'");
        $_SESSION['idusersss'] = $billet->getId();
        $_SESSION['idEvent'] = $billet->getIdEvent();
        $query = Query::CRUD("SELECT * FROM livre_or WHERE idusers='$id'")->rowCount();
        $message = $event->getMessage();
        
        /*   if($event->getTypeEvent() == 'Mariage'){
        if($query){
            header("Location:invitation.html?id=".$billet->getIdEvent());
        }
           }else{ */
           
           
           $jours = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
$mois = [
    1 => 'janvier', 'février', 'mars', 'avril', 'mai', 'juin',
    'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'
];

$date = new DateTime($event->getDate());
$jourSemaine = $jours[$date->format('w')]; // Jour de la semaine
$jour = $date->format('d'); // Jour du mois
$moisEnLettres = $mois[(int)$date->format('m')]; // Mois
$annee = $date->format('Y'); // Année

// Construire la date en toutes lettres
$dateEnLettres = ucfirst("$jourSemaine $jour $moisEnLettres $annee");

$date = new DateTime($event->getDateCommune());
$jourSemaine = $jours[$date->format('w')]; // Jour de la semaine
$jour = $date->format('d'); // Jour du mois
$moisEnLettres = $mois[(int)$date->format('m')]; // Mois
$annee = $date->format('Y'); // Année

// Construire la date en toutes lettres
$dateEnCommune = ucfirst("$jourSemaine $jour $moisEnLettres $annee");



               
              include('../qrcode/qrlib.php');

QRcode::png(Events::key()->encrypt($id),  '../docs/qr'.$id.'.png');
$jjj = true;


/*
while($jjj){
 header('Content-Type: application/octet-stream');
    header('Content-Length: '. 1000);
    header('Content-disposition: attachment; filename='. $billet->getNom().'.png');
    header('Pragma: no-cache');
    header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    header('Expires: 0');
    readfile('docs/qr.png');
    $jjj = false;
}

*/
// exit();
       /*    } */
        


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>IHS-Event</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link href="./style/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="./style/bootstrap/css/bootstrap-icon-1.10.5.css" />
    <!-- Goole Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&family=Work+Sans:wght@100;300;400;600;700&display=swap" rel="stylesheet" />
    <link href="./style/sacramento_work_sans.css" rel="stylesheet" />
      <link rel="shortcut icon" href="docs/<?=$event->getLogo()?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Countdown -->
    <link rel="stylesheet" href="./style/simplyCountdown.theme.default.css" />
    <!-- Styling -->
    <link rel="stylesheet" href="./style/style.css" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<style>
#contenue {
  font-family: "Sofia", sans-serif;
  font-size: 12px;
  color:black;
}

          .image-container {
              position: relative;
              display: inline-block;
              color: var(--pink);
          }

          .background-image {
              width: 100%;
              height: auto;
              display: block;
          }

          .overlay-text {
              position: absolute;
              top: 35%;
              left: 50%;
              transform: translate(-50%, -50%);
              color: #f1f1f1; /* Grey text */
              font-size: 12px;
              text-align: center;
              
             
              padding: 10px;
              border-radius: 5px;
              width: 80%; /* Ajuste la largeur à 80% du conteneur */
              height: 50%;

          }

      </style>
  </head>
  <body>
      
  

    <section  id="hero" class="hero w-100 h-100 p-3 margin-auto text-center d-flex justify-content-center align-items-center text-white">
      <main>

        <h1><?=$event->getNom()?></h1>
        <p>Bloquez la date ! Le <?=$dateEnLettres?></p>

        <a href="#home" class="btn btn-lg mt-4" onclick="return enableScroll()">Voir l'invitation</a>
      </main>
    </section>



    <section id="home" class="home" >

    
             <div id="capture-zone" >
              <div class="image-container">
  <div class="container" >
        <div class="row" >

          <div class="col-md-8 text-center" >
                 
<img src="img/backg.jpeg" alt="Image de fond" class="background-image">
                    
                   <div class="overlay-text">
                       
                        <h2>Invitation</h2> <h3><?php
                        if($billet->getNbre() == 1) echo 'Singleton';
                        else echo 'Couple';
                        ?></h3>
                      <div id="contenue">
                          C'est avec une immense joie que <b><?=$event->getNom()?></b> vous invitent à célébrer leur mariage civil à la commune de <b><?=$event->getCommune()?></b>, le <b><?=$dateEnCommune?></b> à <b><?=$event->getHeureCommune()?></b>. <br>Religieux  💍 le <b><?=$dateEnLettres?></b> à <b><?=$event->getHeureMesse()?></b> <b><?=$event->getLieuMesse()?></b>.<br>
                          
                          Cet événement unique symbolisera l'union de deux âmes qui se sont trouvées et qui souhaitent partager ce moment de bonheur avec vous.
La soirée dansante se déroulera dans la salle des fêtes <b><?=$event->getModifieMoi()?></b> à partir de <b>18:30</b>, <b><?=$event->getAdresse()?></b>.

Nous serons ravis de vous retrouver pour cette occasion spéciale.

Avec tout notre amour,
                      <div><b><?=$event->getNom()?></b> 💕</div>
                      
                        <img  width="100" heigth="100" src="../docs/qr<?=$id?>.png"><br>
                     
                  </div>
                  <p><?=$id?></p>
                  <br><br>
                   <a href="<?=$message?>" target="_blank" id="mapss" class="btn btn-light ">Afficher la carte</a>
                      <button  class="btn btn-danger" id="download-btn">Télécharger</button>
              </div>

          </div>
        </div>
      </div>
</div>
</div>
 </div>
    </section>
   

    <section id="info" >
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 col-10 text-center">
            <h2><b>Livre d'or</b></h2>
              <p>Laissez un petit mot aux mariés</p>
                      </div>
                      <div id="msg"></div>
        </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-md-4" style="padding: 5%">
    
            <div class="form-group">
                <label>Votre message</label>
                
                <textarea class="form-control" id="message" style="height: 100px"  id="examplePassword1" placeholder="Félicitations pour cette grande nouvelle"></textarea>
            </div>
            <div style="text-align: center">
           
             <button class="btn btn-lg btn-danger mt-4 align-items-center" onclick="sendData()" id="btn_send_data" type="button">Envoyer</button>
                    <button class="btn btn-lg btn-danger mt-4 align-items-center" hidden id="load">
                        <i class="fa fa-refresh fa-spin"></i>Veuillez patienter svp
                    </button>
            </div>
      
          </div>
      </div>
    </section>


    <footer class="mt-4">
      <div class="container text-white">
        <div class="row">
          <div class="col text-center">
              <small class="d-block">&copy; <?=date("Y")?> IHS-RDC, All Rights Reserved</small> </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="./style/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- Lightbox -->
    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>
    <script src="./script/bs5-lightbox-1.8.3.bundle.js"></script>
    <!-- Countdown -->
    <script src="./script/simplyCountdown.min.js"></script>
    <!-- Styling -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
      let f = null
      
      function sendData(){
          let message = document.getElementById("message").value
          if (message){
              document.getElementById("btn_send_data").hidden = true
              document.getElementById("load").hidden = false
              $.ajax({
                  url: "https://event.ihs-rdc.com/data.html",
                  method: "POST",
                  data: {
                      message_invite: message
                  },
                  success: function (data) {
                      f = data

                  }


              })

              setTimeout(RedirectionJavascript, 5000)
          }
          else{
              
              document.getElementById("msg").innerHTML = '<div class="alert alert-danger text-center"><strong>Veuillez remplir les champs vides svp !</strong></div>'
              
          }


      }

      function RedirectionJavascript(){
          //location.reload();
              document.getElementById("msg").innerHTML = '<div class="alert alert-success text-center"><strong>Votre message a été envoyer avec succès. Merci<br></strong></div>'
              document.getElementById("btn_send_data").hidden = false
              document.getElementById("load").hidden = true
             
      }

 
        // Le texte à animer
        const text = "";
        const textElement = document.getElementById('text');
        let index = 0;

        // Fonction pour ajouter les lettres une par une
        function typeWriter() {
            if (index < text.length) {
                textElement.innerHTML += text.charAt(index);
                index++;
                setTimeout(typeWriter, 100); // Délai entre chaque lettre (100ms)
            }
        } 

        // Démarre l'animation
       // typeWriter();
    </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <script>
        const captureZone = document.getElementById('capture-zone');
        const downloadBtn = document.getElementById('download-btn');

        downloadBtn.addEventListener('click', () => {
            document.getElementById("mapss").hidden = true
            document.getElementById("download-btn").hidden = true
            // Utiliser html2canvas pour capturer la zone spécifiée
            html2canvas(captureZone).then(canvas => {
                // Convertir le canvas en image
                const image = canvas.toDataURL('image/png');
                
                // Créer un lien de téléchargement
                const link = document.createElement('a');
                link.href = image;
                link.download = '<?=$event->getNom()?>-invitation.png';  // Nom du fichier téléchargé
                link.click();  // Déclencher le téléchargement
            });
        });
    

      const offCanvas = document.querySelector(".offcanvas");
      const stickyTop = document.querySelector(".sticky-top");

     /* offCanvas.addEventListener("show.bs.offcanvas", function (e) {
        stickyTop.style.overflow = "visible";
      });

      offCanvas.addEventListener("hidden.bs.offcanvas", function (e) {
        stickyTop.style.overflow = "hidden";
      }); */

      const elementRoot = document.querySelector(":root");

      function disableScroll() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        let scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;

        window.onscroll = function () {
          window.scrollTo(scrollTop, scrollLeft);
        };

        elementRoot.style.scrollBehavior = "auto";
      }

      function enableScroll() {
        window.onscroll = function () {};
        elementRoot.style.scrollBehavior = "smooth";
        localStorage.setItem("opened", "true");
      }

      if (!localStorage.getItem("opened")) {
        disableScroll();
      }

    </script>
  </body>
</html>
<?php } ?>
