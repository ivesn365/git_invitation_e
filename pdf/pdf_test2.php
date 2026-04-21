
<?php


// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');
require_once('../header.php');

$tel = $_SESSION['idEvent'];
$l = Events::afficher2("SELECT * FROM events WHERE id='$tel'");
$query = Query::CRUD("SELECT * FROM `modelInvitation` WHERE `idEvent`='$tel' ORDER BY id DESC LIMIT 1");
$k = $query->fetch(PDO::FETCH_OBJ);
$model = $k->idModel;

$date=date_create($l->getDate());
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
/*
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('LKC');
$pdf->SetTitle('LWAMBIYI KALENGA CORPORATION SARL');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
*/


// set default header data

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    //$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

$html = '
<!DOCTYPE html>
<html>
<head>
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
<body style="margin: 0;padding: 10%"> ';
$tel = Events::key()->encrypt($_SESSION['pseudo']);
$l = Events::afficher2("SELECT * FROM events WHERE telephone='$tel'");
$_SESSION['idEvent'] = $l->getId();

$html .=' <div class="row">';

    if ($model == 1){
        $html .=' <div class="col-12 col-xl-6 grid-margin stretch-card">

            <!-- Begin shared CSS values -->
            <style class="shared-css" type="text/css" >
                .t {
                    transform-origin: bottom left;
                    z-index: 2;
                    position: absolute;
                    white-space: pre;
                    overflow: visible;
                    line-height: 1.5;
                    scro
                }
                .text-container {
                    white-space: pre;
                }
                @supports (-webkit-touch-callout: none) {
                    .text-container {
                        white-space: normal;
                    }
                }
            </style>
            <!-- End shared CSS values -->


            <!-- Begin inline CSS -->
            <style type="text/css" >

                #t1_1{left:100px;bottom:292px;letter-spacing:1.66px;}
                #t2_1{left:80px;bottom:271px;letter-spacing:1.68px;}
                #t3_1{left:203px;bottom:486px;letter-spacing:3.28px;}
                #t4_1{left:203px;bottom:591px;letter-spacing:3.36px;}
                #t5_1{left:251px;bottom:539px;letter-spacing:0.18px;}
                #t6_1{left:50px;bottom:114px;letter-spacing:1.43px;}
                #t7_1{left:192px;bottom:69px;letter-spacing:2.66px;}
                #t8_1{left:244px;bottom:228px;letter-spacing:2.57px;}
                #t9_1{left:151px;bottom:192px;letter-spacing:2.57px;}
                #ta_1{left:321px;bottom:193px;letter-spacing:2.53px;}
                #tb_1{left:255px;bottom:158px;letter-spacing:2.54px;}
                #tc_1{left:256px;bottom:176px;letter-spacing:6px;}

                .s0{font-size:15px;font-family:TheSeasons-Lt_1j;color:#000;}
                .s1{font-size:40px;font-family:TheSeasons-Reg_1k;color:#000;}
                .s2{font-size:42px;font-family:TheSeasons-Reg_1k;color:#262626;}
                .s3{font-size:41px;font-family:PinyonScript_1l;color:#000;}
                .s4{font-size:18px;font-family:PinyonScript_1l;color:#000;}
                .s5{font-size:16px;font-family:TheSeasons-Reg_1k;color:#000;}
                .s6{font-size:38px;font-family:TheSeasons-Reg_1k;color:#000;}
            </style>
            <!-- End inline CSS -->

            <!-- Begin embedded font definitions -->
            <style id="fonts1" type="text/css" >

                @font-face {
                    font-family: PinyonScript_1l;
                    src: url("fonts/PinyonScript_1l.woff") format("woff");
                }

                @font-face {
                    font-family: TheSeasons-Lt_1j;
                    src: url("fonts/TheSeasons-Lt_1j.woff") format("woff");
                }

                @font-face {
                    font-family: TheSeasons-Reg_1k;
                    src: url("fonts/TheSeasons-Reg_1k.woff") format("woff");
                }

            </style>
            <!-- End embedded font definitions -->

            <!-- Begin page background -->
            <div id="pg1Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
            <div id="pg1" style="-webkit-user-select: none;"><object width="550" height="770" data="1/1.svg" type="image/svg+xml" id="pdf1" style="width:550px; height:770px; -moz-transform:scale(1); z-index: 0;"></object></div>
            <!-- End page background -->


            <!-- Begin text definitions (Positioned/styled in CSS) -->
            <div class="text-container">
                <a href="data.html?validerInvitation=1" style="left: 20px;" class="btn btn-primary t s6 btn-sm text-white" >Choisir</a>
                <span id="t1_1" class="t s0">NOUS VOUS INVITONS À PARTAGER AVEC NOUS  </span>
                <span id="t2_1" class="t" style="margin-right: 10%">UNE CÉLÉBRATION DE L\'AMOUR ET DE L\'ENGAGEMENT</span>
                <span id="t3_1" class="t s1">'.ucfirst(substr(substr($l->getNom(),  strpos($l->getNom(), "&")), strpos($l->getNom(), "&"))).' </span>
                <span id="t4_1" class="t s2">'.ucfirst(substr($l->getNom(), 0, strpos($l->getNom(), "&"))).'</span>
                <span id="t5_1" class="t s3">& </span>

                <span id="t6_1" class="t" width="20"><?=$l->getAdresse()?>  </span>
                <span id="t6_1" class="t s4" style="margin: 5%; text-align: center">Salle : '.$l->getModifieMoi() .'</span>
              
                <span id="t8_1" class="t s5">'.date_format($date,"F") .'</span>
                <span id="t9_1" class="t s5">'.date_format($date,"l") .'</span><span id="ta_1" class="t s5">'.$l->getDeleteMe().'</span>
                <span id="tb_1" class="t s5">'.date_format($date,"Y") .'</span>
                <span id="tc_1" class="t s6">'.date_format($date,"d") .'</span>

            </div>


        </div>';

    }
    elseif ($model == 2){
      $html .= '<div class="col-12 col-xl-6 grid-margin stretch-card">

            <!-- Begin shared CSS values -->
            <style  type="text/css" >
                .t3 {
                    transform-origin: bottom left;
                    z-index: 2;
                    position: absolute;
                    white-space: pre;
                    overflow: visible;
                    line-height: 1.5;
                }
                .text-container {
                    white-space: pre;
                }
                @supports (-webkit-touch-callout: none) {
                    .text-container {
                        white-space: normal;
                    }
                }
            </style>
            <!-- End shared CSS values -->


            <!-- Begin inline CSS -->
            <style type="text/css" >

                #t1_13{left:172px;bottom:447px;letter-spacing:-0.17px;}
                #t2_13{left:259px;bottom:375px;}
                #t3_13{left:182px;bottom:304px;letter-spacing:-0.15px;}
                #t4_13{left:140px;bottom:120px;letter-spacing:0.24px;}
                #t5_13{left:346px;bottom:120px;letter-spacing:0.22px;}
                #t6_13{left:243px;bottom:94px;letter-spacing:0.17px;}
                #t7_13{left:252px;bottom:82px;letter-spacing:0.23px;}
                #t8_13{left:243px;bottom:161px;letter-spacing:0.2px;}
                #t9_13{left:156px;bottom:689px;letter-spacing:-0.15px;}
                #ta_13{left:50px;bottom:37px;letter-spacing:0.08px;}

                .s03{font-size:81px;font-family:Daydream_1f;color:#000;}
                .s13{font-size:19px;font-family:TheSeasons-Reg_1g;color:#000;}
                .s23{font-size:53px;font-family:TheSeasons-Reg_1g;color:#000;}
                .s33{font-size:21px;font-family:BricolageGrotesque-Regular_1h;color:#4B744B;}
                .s43{font-size:19px;font-family:OpenSans-Italic_1i;color:#000;}
            </style>
            <!-- End inline CSS -->

            <!-- Begin embedded font definitions -->
            <style type="text/css" >

                @font-face {
                    font-family: BricolageGrotesque-Regular_1h;
                    src: url("fonts3/BricolageGrotesque-Regular_1h.woff") format("woff");
                }

                @font-face {
                    font-family: Daydream_1f;
                    src: url("fonts3/Daydream_1f.woff") format("woff");
                }

                @font-face {
                    font-family: OpenSans-Italic_1i;
                    src: url("fonts3/OpenSans-Italic_1i.woff") format("woff");
                }

                @font-face {
                    font-family: TheSeasons-Reg_1g;
                    src: url("fonts3/TheSeasons-Reg_1g.woff") format("woff");
                }

            </style>
            <!-- End embedded font definitions -->

            <!-- Begin page background -->
            <div id="pg1Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
            <div id="pg1" style="-webkit-user-select: none;"><object width="550" height="770" data="3/1.svg" type="image/svg+xml" id="pdf1" style="width:550px; height:770px; -moz-transform:scale(1); z-index: 0;"></object></div>
            <!-- End page background -->


            <!-- Begin text definitions (Positioned/styled in CSS) -->
            <div class="text-container">
                <a href="data.html?validerInvitation=2" style="left: 20px;" class="btn btn-primary t s6 btn-sm text-white" >Choisir</a>
                <span id="t1_13" class="t3 s03">'.ucfirst(substr($l->getNom(), 0, strpos($l->getNom(), "&"))).'</span>
                <span id="t2_13" class="t3 s03">&amp; </span>
                <span id="t3_13" class="t3 s03">'.ucfirst(substr(substr($l->getNom(),  strpos($l->getNom(), "&")), strpos($l->getNom(), "&"))).'</span>
                <span id="t4_13" class="t3 s13">'.date_format($date,"l") .'</span><span id="t5_13" class="t3 s13">'.$l->getDeleteMe().'</span>
                <span id="t6_13" class="t3 s23">'.date_format($date,"d").'</span>
                <span id="t7_13" class="t3 s13">'.date_format($date,"Y").'</span>
                <span id="t8_13" class="t3 s13">'.date_format($date,"F").'</span>
                <span id="t9_13" class="t3 s33">INVITATION DE MARIAGE </span>

                <span id="ta_13" class="t3 s43">Salle : '.$l->getModifieMoi().'<br>'.$l->getAdresse().'</span>


            </div>
        </div>';
    }
    elseif ($model == 3){
      $html .='<div class="col-12 col-xl-6 grid-margin stretch-card">

            <!-- Begin shared CSS values -->
            <style class="shared-css" type="text/css" >
                .t4 {
                    transform-origin: bottom left;
                    z-index: 2;
                    position: absolute;
                    white-space: pre;
                    overflow: visible;
                    line-height: 1.5;
                }
                .text-container {
                    white-space: pre;
                }
                @supports (-webkit-touch-callout: none) {
                    .text-container {
                        white-space: normal;
                    }
                }
            </style>
            <!-- End shared CSS values -->


            <!-- Begin inline CSS -->
            <style type="text/css" >

                #t1_14{left:216px;bottom:534px;letter-spacing:0.17px;}
                #t2_14{left:267px;bottom:488px;}
                #t3_14{left:189px;bottom:441px;letter-spacing:0.16px;}
                #t4_14{left:172px;bottom:262px;letter-spacing:1.6px;}
                #t5_14{left:167px;bottom:245px;letter-spacing:1.62px;}
                #t6_14{left:210px;bottom:706px;letter-spacing:1.62px;}
                #t7_14{left:196px;bottom:688px;letter-spacing:1.6px;}
                #t8_14{left:202px;bottom:106px;letter-spacing:1.23px;}
                #t9_14{left:120px;bottom:91px;letter-spacing:1.24px;}
                #ta_14{left:210px;bottom:43px;letter-spacing:-0.04px;}
                #tb_14{left:253px;bottom:215px;letter-spacing:1.59px;}
                #tc_14{left:242px;bottom:151px;letter-spacing:-0.28px;}
                #td_14{left:250px;bottom:141px;letter-spacing:1.6px;}
                #te_14{left:132px;bottom:179px;letter-spacing:1.6px;}
                #tf_14{left:356px;bottom:180px;letter-spacing:1.59px;}

                .s044{font-size:33px;font-family:BrittanySignatureRegular_1w;color:#A87526;}
                .s14{font-size:15px;font-family:GlacialIndifference-Regular_1x;color:#000;}
                .s24{font-size:15px;font-family:GlacialIndifference-Regular_1x;color:#512E1E;}
                .s34{font-size:22px;font-family:BrittanySignatureRegular_1w;color:#512E1E;}
                .s44{font-size:51px;font-family:GlacialIndifference-Regular_1x;color:#000;}
            </style>
            <!-- End inline CSS -->

            <!-- Begin embedded font definitions -->
            <style id="fonts1" type="text/css" >

                @font-face {
                    font-family: BrittanySignatureRegular_1w;
                    src: url("fonts4/BrittanySignatureRegular_1w.woff") format("woff");
                }

                @font-face {
                    font-family: GlacialIndifference-Regular_1x;
                    src: url("fonts4/GlacialIndifference-Regular_1x.woff") format("woff");
                }

            </style>
            <!-- End embedded font definitions -->

            <!-- Begin page background -->
            <div id="pg1Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
            <div id="pg1" style="-webkit-user-select: none;"><object width="550" height="770" data="4/1.svg" type="image/svg+xml" id="pdf1" style="width:550px; height:770px; -moz-transform:scale(1); z-index: 0;"></object></div>
            <!-- End page background -->


            <!-- Begin text definitions (Positioned/styled in CSS) -->
            <div class="text-container">
                <a href="data.html?validerInvitation=3" style="left: 20px;" class="btn btn-primary t s6 btn-sm text-white" >Choisir</a>
                <span id="t1_14" class="t4 s04">'.ucfirst(substr($l->getNom(), 0, strpos($l->getNom(), "&"))).'</span>
                <span id="t2_14" class="t4 s04">&amp; </span>
                <span id="t3_14" class="t4 s044">'.ucfirst(substr(substr($l->getNom(),  strpos($l->getNom(), "&")), strpos($l->getNom(), "&"))).'</span>
                <span id="t4_14" class="t4 s14">VOUS INVITENT À REJOINDRE LEUR </span>
                <span id="t5_14" class="t4 s14">CÉLÉBRATION DE MARIAGE LE</span>
                <span id="t6_14" class="t4 s14">ENSEMBLE</span>
                <span id="t7_14" class="t4 s14">AVEC LEURS FAMILLES</span>
                <span id="t8_14" class="t4 s24">Salle : '.$l->getModifieMoi().'</span>
                <span id="t9_14" class="t4 s24">'.$l->getAdresse().'</span>
                <span id="ta_14" class="t4 s34"></span>
                <span id="tb_14" class="t4 s14">'.date_format($date,"F") .' </span>
                <span id="tc_14" class="t4 s44">'.date_format($date,"d") .' </span>
                <span id="td_14" class="t4 s24">'.date_format($date,"Y") .'</span>
                <span id="te_14" class="t4 s14">'.date_format($date,"l") .' </span><span id="tf_14" class="t4 s14">'.$l->getDeleteMe().'</span></div>
            <!-- End text definitions -->

        </div>';

    }
    $html .='
</div>

</body>
</html>';
$pdf->writeHTML($html, true, false, true, false, '');




// test some inline CSS

ob_clean();
$pdf->Output('doc/mariage.pdf', 'F');