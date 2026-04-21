<?php
$tel = Events::key()->encrypt($_SESSION['pseudo']);
$l = Events::afficher2("SELECT * FROM events WHERE telephone='$tel'");
$_SESSION['idEvent'] = $l->getId();
?>
<div class="row" style="overflow:scroll;-webkit-overflow-scrolling: touch;">
    <marquee class="text text-danger">Pour vivre vos évènement en couleur IHS vous offres les invitations de rêve. Vous avez la possibilité de vous exprimer librement sur l'invitation afin de donner le goût à vos invités </marquee>
    <div class="col-12 col-xl-6 grid-margin stretch-card">

    <!-- Begin shared CSS values -->
    <style class="shared-css" type="text/css" >
        .t {
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


    <!-- Begin text definitions (Positioned/styled in CSS) -->
    <div class="text-container">
        <a href="data.html?validerInvitation=1" style="left: 20px;" class="btn btn-primary t s6 btn-sm text-white" >Choisir</a>
        <span id="t1_1" class="t s0">NOUS VOUS INVITONS À PARTAGER AVEC NOUS  </span>
        <span id="t2_1" class="t s0" style="margin-right: 10%">UNE CÉLÉBRATION DE L'AMOUR ET DE L'ENGAGEMENT</span>
        <span id="t3_1" class="t s1"><?=ucfirst(substr(substr($l->getNom(),  strpos($l->getNom(), "&")), strpos($l->getNom(), "&")))?> </span>
        <span id="t4_1" class="t s2"><?=ucfirst(substr($l->getNom(), 0, strpos($l->getNom(), "&")))?> </span>
        <span id="t5_1" class="t s3">& </span>

        <span id="t6_1" class="t" width="20"><?=$l->getAdresse()?>  </span>
        <span id="t6_1" class="t s0" style="margin: 5%; text-align: center">Salle : <?=$l->getModifieMoi()?>  </span>
        <span id="t7_1" class="t s4"> </span>
        <?php
        $date=date_create($l->getDate());

        ?>
        <span id="t8_1" class="t s5"><?=ConvertA::mois(date_format($date,"F")) ?> </span>
        <span id="t9_1" class="t s5"><?=ConvertA::jour(date_format($date,"l")) ?> </span>
        <span id="ta_1" class="t s5"><?=$l->getDeleteMe()?>  </span>
        <span id="tb_1" class="t s5"><?=date_format($date,"Y") ?> </span>
        <span id="tc_1" class="t s6"><?=date_format($date,"d") ?></span>

    </div>


    </div>
    <div class="col-12 col-xl-6 grid-margin stretch-card">

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
            <span id="t1_13" class="t3 s03"><?=ucfirst(substr($l->getNom(), 0, strpos($l->getNom(), "&")))?> </span>
            <span id="t2_13" class="t3 s03">&amp; </span>
            <span id="t3_13" class="t3 s03"><?=ucfirst(substr(substr($l->getNom(),  strpos($l->getNom(), "&")), strpos($l->getNom(), "&")))?> </span>
            <span id="t4_13" class="t3 s13"><?=ConvertA::jour(date_format($date,"l")) ?> </span><span id="t5_13" class="t3 s13"><?=$l->getDeleteMe()?> </span>
            <span id="t6_13" class="t3 s23"><?=date_format($date,"d") ?> </span>
            <span id="t7_13" class="t3 s13"><?=date_format($date,"Y") ?> </span>
            <span id="t8_13" class="t3 s13"><?=ConvertA::mois(date_format($date,"F")) ?> </span>
            <span id="t9_13" class="t3 s33">INVITATION DE MARIAGE </span>

            <span id="ta_13" class="t3 s43">Salle : <?=$l->getModifieMoi()?><br><?=$l->getAdresse()?>   </span>


        </div>
    </div>
    <div class="col-12 col-xl-6 grid-margin stretch-card">

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
            <span id="t1_14" class="t4 s044"><?=ucfirst(substr($l->getNom(), 0, strpos($l->getNom(), "&")))?> </span>
            <span id="t2_14" class="t4 s04">&amp; </span>
            <span id="t3_14" class="t4 s044"><?=ucfirst(substr(substr($l->getNom(),  strpos($l->getNom(), "&")), strpos($l->getNom(), "&")))?></span>
            <span id="t4_14" class="t4 s14">VOUS INVITENT À REJOINDRE LEUR </span>
            <span id="t5_14" class="t4 s14">CÉLÉBRATION DE MARIAGE LE</span>
            <span id="t6_14" class="t4 s14">ENSEMBLE</span>
            <span id="t7_14" class="t4 s14">AVEC LEURS FAMILLES</span>
            <span id="t8_14" class="t4 s24">Salle : <?=$l->getModifieMoi()?></span>
            <span id="t9_14" class="t4 s24"><?=$l->getAdresse()?></span>
            <span id="ta_14" class="t4 s34"></span>
            <span id="tb_14" class="t4 s14"><?=ConvertA::mois(date_format($date,"F")) ?> </span>
            <span id="tc_14" class="t4 s44"><?=date_format($date,"d") ?> </span>
            <span id="td_14" class="t4 s24"><?=date_format($date,"Y") ?> </span>
            <span id="te_14" class="t4 s14"><?=ConvertA::jour(date_format($date,"l")) ?> </span><span id="tf_14" class="t4 s14"><?=$l->getDeleteMe()?> </span></div>
        <!-- End text definitions -->

    </div>

    <div class="col-12 col-xl-6 grid-margin stretch-card" >

        <!-- Begin shared CSS values -->
        <style class="shared-css" type="text/css" >
            .t5 {
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

            #t1_15{left:90px;bottom:100px;letter-spacing:-0.05px;}
            #t2_15{left:321px;bottom:209px;letter-spacing:2.93px;}
            #t3_15{left:249px;bottom:244px;letter-spacing:2.94px;}
            #t4_15{left:157px;bottom:209px;letter-spacing:2.98px;}
            #t5_15{left:252px;bottom:169px;letter-spacing:2.87px;}
            #t6_15{left:254px;bottom:196px;letter-spacing:5.75px;}
            #t7_15{left:172px;bottom:522px;}
            #t8_15{left:172px;bottom:430px;letter-spacing:-0.23px;}
            #t9_15{left:260px;bottom:369px;}
            #ta_15{left:170px;bottom:307px;letter-spacing:-0.2px;}

            .s05{font-size:16px;font-family:CormorantGaramond-Medium_1r;color:#272727;}
            .s15{font-size:17px;font-family:CormorantGaramond-Bold_1s;color:#272727;}
            .s25{font-size:37px;font-family:CormorantGaramond-Bold_1s;color:#DAA773;}
            .s35{font-size:18px;font-family:CormorantGaramond-Medium_1r;color:#272727;}
            .s45{font-size:30px;font-family:Amsterdam-Four_1t;color:#DAA773;}
        </style>
        <!-- End inline CSS -->

        <!-- Begin embedded font definitions -->
        <style id="fonts1" type="text/css" >

            @font-face {
                font-family: Amsterdam-Four_1t;
                src: url("fonts5/Amsterdam-Four_1t.woff") format("woff");
            }

            @font-face {
                font-family: CormorantGaramond-Bold_1s;
                src: url("fonts5/CormorantGaramond-Bold_1s.woff") format("woff");
            }

            @font-face {
                font-family: CormorantGaramond-Medium_1r;
                src: url("fonts5/CormorantGaramond-Medium_1r.woff") format("woff");
            }

        </style>
        <!-- End embedded font definitions -->

        <!-- Begin page background -->
        <div id="pg1Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
        <div id="pg1" style="-webkit-user-select: none;"><object width="550" height="770" data="5/1.svg" type="image/svg+xml" id="pdf1" style="width:550px; height:770px; -moz-transform:scale(1); z-index: 0;"></object></div>
        <!-- End page background -->


        <!-- Begin text definitions (Positioned/styled in CSS) -->
        <div class="text-container">
            <a href="data.html?validerInvitation=4" style="left: 20px;" class="btn btn-primary t s6 btn-sm text-white" >Choisir</a>
            <span id="t1_15" class="t5 s05" style="width: 10%">Salle:<?=$l->getModifieMoi()?><br><?=$l->getAdresse()?> </span>
            <span id="t2_15" class="t5 s15"><?=$l->getDeleteMe()?> </span>
            <span id="t3_15" class="t5 s15"><?=ConvertA::mois(date_format($date,"F")) ?> </span>
            <span id="t4_15" class="t5 s15"><?=ConvertA::jour(date_format($date,"l")) ?> </span>
            <span id="t5_15" class="t5 s15"><?=date_format($date,"Y") ?> </span>
            <span id="t6_15" class="t5 s25"><?=date_format($date,"d") ?> </span>
            <span id="t7_15" class="t5 s35">Avec notre famille, nous</span>
            <span id="t8_15" class="t5 s45"><?=ucfirst(substr($l->getNom(), 0, strpos($l->getNom(), "&")))?> </span>
            <span id="t9_15" class="t5 s45">&amp; </span>
            <span id="ta_15" class="t5 s45 text-center"><?=ucfirst(substr(substr($l->getNom(),  strpos($l->getNom(), "&")), strpos($l->getNom(), "&")))?> </span></div>
        <!-- End text definitions -->


    </div>
    <div class="row" style="overflow:scroll;-webkit-overflow-scrolling: touch;">
        <div class="col-12 col-xl-6 grid-margin stretch-card">
            <style class="shared-css" type="text/css" >
                .t6 {
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

                #t1_16{left:158px;bottom:489px;letter-spacing:-0.16px;}
                #t2_16{left:193px;bottom:435px;letter-spacing:-0.14px;}
                #t3_16{left:186px;bottom:191px;letter-spacing:-0.29px;}
                #t4_16{left:235px;bottom:166px;letter-spacing:-0.29px;}
                #t5_16{left:100px;bottom:122px;letter-spacing:-0.29px;}
                #t6_16{left:196px;bottom:97px;letter-spacing:-0.29px;}
                #t7_16{left:110px;bottom:639px;letter-spacing:0.21px;}
                #t8_16{left:242px;bottom:389px;letter-spacing:0.21px;}
                #t9_16{left:231px;bottom:362px;letter-spacing:0.21px;}
                #ta_16{left:231px;bottom:334px;letter-spacing:0.21px;}

                .s06{font-size:48px;font-family:Atteron_1t;color:#000;}
                .s16{font-size:17px;font-family:CourierPrime-Regular_1u;color:#000;}
                .s26{font-size:18px;font-family:CourierPrime-Regular_1u;color:#000;}
            </style>
            <!-- End inline CSS -->

            <!-- Begin embedded font definitions -->
            <style id="fonts1" type="text/css" >

                @font-face {
                    font-family: Atteron_1t;
                    src: url("fonts6/Atteron_1t.woff") format("woff");
                }

                @font-face {
                    font-family: CourierPrime-Regular_1u;
                    src: url("fonts6/CourierPrime-Regular_1u.woff") format("woff");
                }

            </style>
            <!-- End embedded font definitions -->

            <!-- Begin page background -->
            <div id="pg1Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
            <div id="pg1" style="-webkit-user-select: none;"><object width="550" height="770" data="6/1.svg" type="image/svg+xml" id="pdf1" style="width:550px; height:770px; -moz-transform:scale(1); z-index: 0;"></object></div>
            <!-- End page background -->


            <!-- Begin text definitions (Positioned/styled in CSS) -->
            <div class="text-container">
                <a href="data.html?validerInvitation=5" style="left: 20px;" class="btn btn-primary t s6 btn-sm text-white" >Choisir</a>
                <span id="t1_16" class="t6 s06"><?=ucfirst(substr($l->getNom(), 0, strpos($l->getNom(), "&")))?> </span>
                <span id="t2_16" class="t6 s06">&amp; <?=ucfirst(substr(substr($l->getNom(),  strpos($l->getNom(), "&")), strpos($l->getNom(), "&")))?> </span>
                <span id="t3_16" class="t6 s16">Salle:<?=$l->getModifieMoi()?></span>
                <span id="t4_16" class="t6 s16"> </span>
                <span id="t5_16" class="t6 s16"><?=$l->getAdresse()?>  </span>
                <span id="t6_16" class="t6 s16"> </span>
                <span id="t7_16" class="t6 s26">Vous êtes invité à notre mariage ! </span>
                <span id="t8_16" class="t6 s26"><?=ConvertA::jour(date_format($date,"l")) ?> </span>
                <span id="t9_16" class="t6 s26"><?=date_format($date,"d/m/Y") ?> </span>
                <span id="ta_16" class="t6 s26"><?=$l->getDeleteMe()?> </span></div>
            <!-- End text definitions -->


        </div>
        <div class="col-12 col-xl-6 grid-margin stretch-card">
            <!-- Begin shared CSS values -->
            <style class="shared-css" type="text/css" >
                .t7 {
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

                #t1_17{left:210px;bottom:643px;letter-spacing:3.32px;}
                #t2_17{left:194px;bottom:624px;letter-spacing:3.33px;}
                #t3_17{left:147px;bottom:606px;letter-spacing:3.33px;}
                #t4_17{left:146px;bottom:451px;letter-spacing:0.02px;}
                #t5_17{left:260px;bottom:406px;}
                #t6_17{left:173px;bottom:360px;letter-spacing:0.02px;}
                #t7_17{left:207px;bottom:263px;letter-spacing:0.04px;}
                #t8_17{left:210px;bottom:211px;letter-spacing:0.08px;}
                #t9_17{left:217px;bottom:189px;letter-spacing:0.08px;}
                #ta_17{left:210px;bottom:167px;letter-spacing:0.07px;}
                #tb_17{left:210px;bottom:115px;letter-spacing:-0.18px;}
                #tc_17{left:150px;bottom:80px;letter-spacing:-0.17px;}

                .s07{font-size:14px;font-family:Mak-Light_16;color:#000;}
                .s17{font-size:33px;font-family:ArsenicaAntiqua-Regular_17;color:#000;}
                .s27{font-size:22px;font-family:PlayfairDisplay-Regular_18;color:#000;}
                .s37{font-size:16px;font-family:PlayfairDisplay-Regular_18;color:#000;}
                .s47{font-size:15px;font-family:PlayfairDisplay-Regular_18;color:#000;}
            </style>
            <!-- End inline CSS -->

            <!-- Begin embedded font definitions -->
            <style id="fonts1" type="text/css" >

                @font-face {
                    font-family: ArsenicaAntiqua-Regular_17;
                    src: url("fonts7/ArsenicaAntiqua-Regular_17.woff") format("woff");
                }

                @font-face {
                    font-family: Mak-Light_16;
                    src: url("fonts7/Mak-Light_16.woff") format("woff");
                }

                @font-face {
                    font-family: PlayfairDisplay-Regular_18;
                    src: url("fonts7/PlayfairDisplay-Regular_18.woff") format("woff");
                }

            </style>
            <!-- End embedded font definitions -->

            <!-- Begin page background -->
            <div id="pg1Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
            <div id="pg1" style="-webkit-user-select: none;"><object width="550" height="770" data="7/1.svg" type="image/svg+xml" id="pdf1" style="width:550px; height:770px; -moz-transform:scale(1); z-index: 0;"></object></div>
            <!-- End page background -->


            <!-- Begin text definitions (Positioned/styled in CSS) -->
            <div class="text-container">
                <a href="data.html?validerInvitation=6" style="left: 20px;" class="btn btn-primary t s6 btn-sm text-white" >Choisir</a>
                <span id="t1_17" class="t7 s07">Sois notre invité </span>
                <span id="t2_17" class="t7 s07">Nous attendons votre </span>
                <span id="t3_17" class="t7 s07">présence à notre mariage </span>
                <span id="t4_17" class="t7 s17"><?=ucfirst(substr($l->getNom(), 0, strpos($l->getNom(), "&")))?> </span>
                <span id="t5_17" class="t7 s17">&amp; </span>
                <span id="t6_17" class="t7 s17"> <?=ucfirst(substr(substr($l->getNom(),  strpos($l->getNom(), "&")), strpos($l->getNom(), "&")))?>  </span>
                <span id="t7_17" class="t7 s27"></span>
                <span id="t8_17" class="t7 s37"><?=ConvertA::jour(date_format($date,"l")) ?>, </span>
                <span id="t9_17" class="t7 s37"><?=ConvertA::mois(date_format($date,"F")) ?>  <?=(date_format($date,"d")) ?>  </span>
                <span id="ta_17" class="t7 s37"><?=(date_format($date,"Y")) ?> | <?=$l->getDeleteMe() ?> </span>
                <span id="tb_17" class="t7 s47">Salle : <?=$l->getModifieMoi() ?> </span>
                <span id="tc_17" class="t7 s47"><?=$l->getAdresse() ?> </span></div>
        </div>
    </div>


    </div>





</div>
