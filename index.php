<?php
    require_once ('header.php');

    if ($_SESSION['roleeeeeeee']){

?>
<!DOCTYPE html>
<html lang="fr">

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
  <link rel="shortcut icon" href="images/logo.png" />

</head>
<body>
<?php
    if ($_SESSION['roleeeeeeee']== 'adminSysY'){

?>
  <div class="container-scroller d-flex">
    <!-- partial:./partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item sidebar-category">
          <p>IHS-EVENT</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="mdi mdi-view-quilt menu-icon"></i>
            <span class="menu-title">Tableau de bord</span>
            <div class="badge badge-info badge-pill">2</div>
          </a>
        </li>
        <li class="nav-item sidebar-category">
          <p>Menu</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-palette menu-icon"></i>
            <span class="menu-title">Gestion utilisateur</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Ajouter</a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Afficher</a></li>
            </ul>
          </div>
        </li>



        <li class="nav-item sidebar-category">
          <p>Evenement</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">Gestion evenement</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="page-formEvent">Nouveau </a></li>
              <li class="nav-item"> <a class="nav-link" href="page-afficherEvent">Afficher</a></li>
            </ul>
          </div>
        </li>

      </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>

          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Bon retour, <?=$_SESSION['pseudo']?> </h4>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
              <h4 class="mb-0 font-weight-bold d-none d-xl-block"><?=date("d/m/Y")?></h4>
            </li>


          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
          <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Recherchez" aria-label="search" aria-describedby="search">
              </div>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="images/faces/face5.jpg" alt="profile"/>
                <span class="nav-profile-name"><?=$_SESSION['pseudo']?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

                <a class="dropdown-item" href="data.html?dec=true">
                  <i class="mdi mdi-logout text-primary"></i>
                  Se déconnecter
                </a>
              </div>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link icon-link">
                <i class="mdi mdi-plus-circle-outline"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link icon-link">
                <i class="mdi mdi-web"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link icon-link">
                <i class="mdi mdi-clock-outline"></i>
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
            <?php
            if(isset($_GET['page'])){
                if ($_GET['page'] == 'accueil') include ("Sysvues/admin/accueil.php");
                elseif ($_GET['page'] == 'formEvent') include ("Sysvues/admin/form_evenement.php");
                elseif ($_GET['page'] == 'afficherEvent') include ("Sysvues/admin/afficher.php");
            }else{
                include ("Sysvues/admin/accueil.php");
            }

            ?>
          <!-- row end -->
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./partials/_footer.html -->
        <footer class="footer">
          <div class="card">
            <div class="card-body">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © IHS-EVENT 2024 - <?=date("Y")?></span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Produced by  <a href="https://ihs-rdc.com/" target="_blank">IHS-RDC</a></span>
              </div>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
        <?php
    }
    elseif ($_SESSION['roleeeeeeee'] == 'client'){ ?>
        <div class="container-scroller d-flex">
            <!-- partial:./partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item sidebar-category">
                        <p>IHS-EVENT</p>
                        <span></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="mdi mdi-view-quilt menu-icon"></i>
                            <span class="menu-title">Tableau de bord</span>
                            <div class="badge badge-info badge-pill"></div>
                        </a>
                    </li>
                    <li class="nav-item sidebar-category">
                        <p>Menu</p>
                        <span></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="mdi mdi-palette menu-icon"></i>
                            <span class="menu-title">Gestion table</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="page-formTable">Afficher</a></li>
                            </ul>
                        </div>
                    </li>



                    <li class="nav-item sidebar-category">
                        <p>Mes invités</p>
                        <span></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                            <i class="mdi mdi-account menu-icon"></i>
                            <span class="menu-title">Mes invités</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="page-usersAff">Afficher</a></li>
                                <li class="nav-item" hidden> <a class="nav-link" href="page-invitation">Modèle des invitations</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#book" aria-expanded="false" aria-controls="book">
                            <i class="mdi mdi-book menu-icon"></i>
                            <span class="menu-title">Mon livre d'or</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="book">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="page-livreOr">Afficher</a></li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:./partials/_navbar.html -->
                <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
                    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                            <span class="mdi mdi-menu"></span>
                        </button>

                        <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Bon retour, <?php
                           $tel = Events::key()->encrypt($_SESSION['pseudo']);
                           $date = date("Y-m-d");
                           $l = Events::afficher2("SELECT * FROM events WHERE telephone='$tel' AND date >='$date' ORDER BY id LIMIT 1");
                           echo $l->getNom();
                            ?> </h4>
                        <ul class="navbar-nav navbar-nav-right">
                            <li class="nav-item">
                                <h4 class="mb-0 font-weight-bold d-none d-xl-block"><?=date("d/m/Y")?></h4>
                            </li>


                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                            <span class="mdi mdi-menu"></span>
                        </button>
                    </div>
                    <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
                        <ul class="navbar-nav mr-lg-2">
                            <li class="nav-item nav-search d-none d-lg-block">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Recherchez" aria-label="search" aria-describedby="search">
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav navbar-nav-right">
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                                    <img src="docs/<?=$l->getLogo()?>" alt="profile"/>
                                    <span class="nav-profile-name"><?=$l->getNom()?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

                                    <a class="dropdown-item" href="data.html?dec=true">
                                        <i class="mdi mdi-logout text-primary"></i>
                                        Se déconnecter
                                    </a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </nav>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">

                            <?php
                            /*  $tel = Events::key()->encrypt($_SESSION['pseudo']);
                                $l = Events::afficher2("SELECT * FROM events WHERE telephone='$tel'");
                                $_SESSION['idEvent'] = $l->getId();
                                $idEvent = $l->getId();

                                $q = Query::CRUD("SELECT * FROM `modelInvitation` WHERE `idEvent`='$idEvent'")->rowCount();
                                if (!$q) {
                                    include("Sysvues/client/invitation.php");
                                }else{ } */
                            if(isset($_GET['page'])){
                              
                                    if ($_GET['page'] == 'accueil') include("Sysvues/client/accueil.php");
                                    elseif ($_GET['page'] == 'invitation') include("Sysvues/client/invitation.php");
                                    elseif ($_GET['page'] == 'formTable') include("Sysvues/client/formTable.php");
                                    elseif ($_GET['page'] == 'usersAff') include("Sysvues/client/add_users.php");
                                    elseif ($_GET['page'] == 'livreOr') include("Sysvues/client/livre_or.php");
                                    else include ("Sysvues/client/accueil.php");
                                
                            }else{
                                include ("Sysvues/client/accueil.php");
                            }
                                

                            ?>
                            <!-- row end -->

                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:./partials/_footer.html -->
                    <footer class="footer">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © IHS-EVENT 2024 - <?=date("Y")?></span>
                                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Produced by  <a href="https://ihs-rdc.com/" target="_blank">IHS-RDC</a></span>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
  <?php  }
    elseif ($_SESSION['roleeeeeeee'] == 'Autre'){ ?>
        <div class="container-scroller d-flex">
            <!-- partial:./partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item sidebar-category">
                        <p>IHS-EVENT</p>
                        <span></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="mdi mdi-view-quilt menu-icon"></i>
                            <span class="menu-title">Tableau de bord</span>
                            <div class="badge badge-info badge-pill"></div>
                        </a>
                    </li>
                    <li class="nav-item sidebar-category">
                        <p>Menu</p>
                        <span></span>
                    </li>
                    <li class="nav-item" hidden>
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="mdi mdi-palette menu-icon"></i>
                            <span class="menu-title">Gestion table</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="page-formTable">Afficher</a></li>
                            </ul>
                        </div>
                    </li>



                    <li class="nav-item sidebar-category">
                        <p>Mes invités</p>
                        <span></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                            <i class="mdi mdi-account menu-icon"></i>
                            <span class="menu-title">Mes invités</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="auth" >
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="page-usersAff">Afficher</a></li>
                                <li class="nav-item" hidden> <a class="nav-link" href="page-invitation">Modèle des invitations</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#book" aria-expanded="false" aria-controls="book">
                            <i class="mdi mdi-book menu-icon"></i>
                            <span class="menu-title">Mon livre d'or</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="book">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="page-livreOr">Afficher</a></li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:./partials/_navbar.html -->
                <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
                    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                            <span class="mdi mdi-menu"></span>
                        </button>

                        <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Bon retour, <?php
                           $tel = Events::key()->encrypt($_SESSION['pseudo']);
                           $l = Events::afficher2("SELECT * FROM events WHERE telephone='$tel'");
                           echo $l->getNom();
                            ?> </h4>
                        <ul class="navbar-nav navbar-nav-right">
                            <li class="nav-item">
                                <h4 class="mb-0 font-weight-bold d-none d-xl-block"><?=date("d/m/Y")?></h4>
                            </li>


                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                            <span class="mdi mdi-menu"></span>
                        </button>
                    </div>
                    <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
                        <ul class="navbar-nav mr-lg-2">
                            <li class="nav-item nav-search d-none d-lg-block">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Recherchez" aria-label="search" aria-describedby="search">
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav navbar-nav-right">
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                                    <img src="docs/<?=$l->getLogo()?>" alt="profile"/>
                                    <span class="nav-profile-name"><?=$l->getNom()?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

                                    <a class="dropdown-item" href="data.html?dec=true">
                                        <i class="mdi mdi-logout text-primary"></i>
                                        Se déconnecter
                                    </a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </nav>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">

                            <?php
                              $tel = Events::key()->encrypt($_SESSION['pseudo']);
                                $l = Events::afficher2("SELECT * FROM events WHERE telephone='$tel'");
                                $_SESSION['idEvent'] = $l->getId();
                                $idEvent = $l->getId();

                                $q = Query::CRUD("SELECT * FROM `modelInvitation` WHERE `idEvent`='$idEvent'")->rowCount();
                               
                            if(isset($_GET['page'])){
                              
                                    if ($_GET['page'] == 'accueil') include("Sysvues/client/accueil.php");
                                    elseif ($_GET['page'] == 'invitation') include("Sysvues/client/invitation.php");
                                    elseif ($_GET['page'] == 'formTable') include("Sysvues/client/formTable.php");
                                    elseif ($_GET['page'] == 'usersAff') include("Sysvues/client/add_users.php");
                                    elseif ($_GET['page'] == 'livreOr') include("Sysvues/client/livre_or.php");
                                
                            }else{
                                include ("Sysvues/client/accueil.php");
                            }
                                

                            ?>
                            <!-- row end -->

                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:./partials/_footer.html -->
                    <footer class="footer">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © IHS-EVENT 2024 - <?=date("Y")?></span>
                                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Produced by  <a href="https://ihs-rdc.com/" target="_blank">IHS-RDC</a></span>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
  <?php  }
    elseif (isset($_GET['invite'])){ ?>
        div class="container-scroller d-flex">
        <!-- partial:./partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item sidebar-category">
                    <p>IHS-EVENT</p>
                    <span></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-view-quilt menu-icon"></i>
                        <span class="menu-title"></span>
                        <div class="badge badge-info badge-pill"></div>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:./partials/_navbar.html -->
            <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>


                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
                <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
                    <ul class="navbar-nav mr-lg-2">
                        <li class="nav-item nav-search d-none d-lg-block">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Recherchez" aria-label="search" aria-describedby="search">
                            </div>
                        </li>
                    </ul>

                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <?php

                    include ("Sysvues/invite/accueil.php");


                    ?>
                    <!-- row end -->

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:./partials/_footer.html -->
                <footer class="footer">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © IHS-EVENT 2024 - <?=date("Y")?></span>
                                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Produced by  <a href="https://ihs-rdc.com/" target="_blank">IHS-RDC</a></span>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
        </div>

   <?php }
    else{
        header("Location:login.html");
    }
    ?>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>

  <!-- End custom js for this page-->
</body>

</html>

<?php

    }else{
        header("Location:login.html");
    }