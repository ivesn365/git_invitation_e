<?php
    require_once ('header.php');

    if (isset($_SESSION['invite'])){
        $id = (intval(Query::securisation($_SESSION['invite'])));
        $billet = Billet::afficher2("SELECT * FROM billet WHERE id='$id'");
        $idEvent = $billet->getIdEvent();
        $event = Events::afficher2("SELECT * FROM events WHERE id='$idEvent'");
        $_SESSION['idusersss'] = $billet->getId();
        $_SESSION['idEvent'] = $billet->getIdEvent();
        $query = Query::CRUD("SELECT * FROM livre_or WHERE idusers='$id'")->rowCount();
        $message = $event->getMessage();
        
           if($event->getTypeEvent() == 'Mariage'){
               header("Location:Mariage/");
           }
        /*if($query){
            header("Location:invitation.html?id=".$billet->getIdEvent());
        }
           }else{ */
               
              include('qrcode/qrlib.php');

QRcode::png(Events::key()->encrypt($_SESSION['idusersss']),  'docs/qr.png');
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
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>IHS-RDC | EVENT</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="docs/<?=$event->getLogo()?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <style>
body {
  font-family:  sans-serif;
}

        #capture-zone {
            
        }
        div img{
            width:300px;
        }
    </style>
</head>

<body id="capture-zone">
  <div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-center auth lock-full-bg">
        <div class="row w-200">
          <div class="col-lg-8 mx-auto">
            <div class="auth-form-transparent text-left p-5 text-center">
              <img src="docs/<?=$event->getLogo()?>" class="" alt="img">
              <div id="text"></div>
                <h4 class="text text-white"> <strong class="text text-success"><br> <?=$event->getNom()?></strong></h4>
                 <h6 class="text text-white" > <strong><?=$event->getTypeEvent()?></strong></h6>
                <h6 class="text text-white" hidden>M/Mme/Couple <strong><?=$billet->getNom()?></strong></h6>
                <div class="alert alert-info" > <br>
                  Bloquez la date !<br> Le <?=$event->getDate()?>
                  </div>
                <p class="alert alert-success"><?=$message?>  
               
            </p>
               <div id="msg"></div>
               <?php
               $livre = Livre_or::afficher2("SELECT * FROM livre_or WHERE idusers='$id' AND idEvent='$idEvent'");
               if(date("Y-m-d") <= $event->getDate()){
               if($livre){
                   if(!$livre->getId()){
               ?>
              <form class="pt-5">
                <div class="form-group">
                  <label for="examplePassword1" class="text-light">Veuillez confirmer votre présence </label>
                    <textarea class="form-control text-center text-white" id="examplePassword1" placeholder="Veuillez confirmer votre présence"></textarea>
                </div>
                <div class="mt-5">
                  <button class="btn btn-block btn-success btn-lg font-weight-medium" onclick="sendData()" id="btn_send_data" type="button">Envoyer & continuer</button>
                    <button class="btn btn-success btn-block border-0" hidden id="load">
                        <i class="fa fa-refresh fa-spin"></i>Veuillez patienter svp
                    </button>
                   
                </div>

              </form>
              
              <?php 
                   }else{ ?>
                        <img id="t10_13"  class="t3 s33" width="180" heigth="180" src="docs/qr.png"><br>
                         <button id="download-btn" class="btn btn-block btn-success btn-lg font-weight-medium" style="margin-top:10px">Veuillez télécharger l'invitation</button>
                           <a href=" <?=$event->getAdresse()?>" target="_blank" id="mapss" class="btn btn-light btn-sm my-4">Afficher la carte</a>
                   
                  <?php }
               }else{ ?>
                    <img id="t10_13"  class="t3 s33" width="180" heigth="180" src="docs/qr.png"><br>
                     <button id="download-btn" class="btn btn-block btn-success btn-lg font-weight-medium" style="margin-top:10px">Veuillez télécharger l'invitation</button>
                       <a href=" <?=$event->getAdresse()?>" target="_blank" id="mapss" class="btn btn-light btn-sm my-4" >Afficher la carte</a>
            <?php   }
               }else{ ?>
                   <div class="alert alert-danger">L'événement a été clôturé, Merci</div>
             <?php  }
              
              ?>
              
              <div class="alert alert-danger" style="margin-top:5px;font-size:10px">Bien sûr ! L'application EVENT est un excellent outil pour organiser et gérer vos cérémonies. Elle peut vous aider à planifier les détails, envoyer des invitations, suivre les RSVP, et bien plus encore. Avez-vous des questions spécifiques sur son utilisation ?</div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
      let f = null
      
      function sendData(){
          let message = document.getElementById("examplePassword1").value
          if (message){
              document.getElementById("btn_send_data").hidden = true
              document.getElementById("load").hidden = false
              $.ajax({
                  url: "data.html",
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
          location.reload();
              document.getElementById("msg").innerHTML = '<div class="alert alert-success text-center"><strong>Votre message a été envoyer avec succès. Merci<br></strong></div>'
              document.getElementById("btn_send_data").hidden = false
              document.getElementById("load").hidden = true
              <?php
              if($event->getTypeEvent() == 'Mariage'){
              ?>
          location.href = "invitation.html?id=<?=$_SESSION['idEvent']?>"
          <?php } ?>
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
                 document.getElementById("download-btn").hidden = true
                  document.getElementById("mapss").hidden = true
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
    </script>
</body>

</html>
<?php

    

    }else{
          header("Location:login.html");
    }
    ?>