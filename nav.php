<?php
$page = pathinfo($_SERVER["REQUEST_URI"], PATHINFO_FILENAME);
?>
 
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic);

        body,
        select,
       /*  
    
        form .row .add .dugme-over, */
         div {
            font-family: "Open Sans", sans-serif !important;
        }

        
        #bittop .social {
            float: none;
            position: absolute;
            top: 0;
            right: 250px;
        }

        #accounts .display.features #features_block_hack {
            width: 945px;
            margin: 0 auto;
            margin-bottom: 30px;
        }

        #accounts .display.features #features_block_hack {
            background: white;
        }

        #accounts .display.features #features_block_hack .features-row {
            padding-top: 30px;
            clear: both
        }

        #accounts .display.feature #features_block_hack .feature {
            width: 450px;
            float: left;
        }

        #accounts .display.features #features_block_hack .feature.full-width {
            width: 100%;
        }

        #accounts .display.features #features_block_hack .feature .thumbnail {
            float: left;
            margin-right: 20px;
            height: 127px;
            overflow: hidden;
            width: 170px;
        }

        #accounts .display.features #features_block_hack .feature .thumbnail img {
            width: 100%;
            height: auto
        }

        #accounts .display.features #features_block_hack .feature .body.full-width {
            width: auto
        }

        #accounts .display.features #features_block_hack .full-width .thumbnail {
            width: 470px;
            height: auto;
        }

        #accounts .display.features #features_block_hack .full-width .body {
            width: 455px;
            height: auto;
            margin-top: 75px;
        }

        /* Regular features */
        #accounts .display.features #features_block_hack .feature .thumbnail {
            float: none;
            height: auto;
            margin-right: 0;
            overflow: hidden;
            width: 100%;
            max-height: 230px;
        }

        #accounts .display.features #features_block_hack.feature .body {
            float: none;
            padding: 20px;
            width: auto;
        }

        /* full width features */
        #accounts .display.features #features_block_hack .feature.full-width .thumbnail {
            float: left;
            width: 470px;
            height: auto;
        }

        #accounts .display.features #features_block_hack .feature.full-width .body {
            float: left;
            width: 435px;
            height: auto;
            margin-left: 30px;
        }

        #accounts .display.features #features_block_hack .feature.full-width .body {
            float: left;
            width: 435px;
            height: auto;
            margin-left: 30px;
        }

        #accounts .display.features #features_block_hack .feature.full-width .body h3 {
            font-size: 19px;
        }
        
        footer {
            background:url(./images/topband_pattern.jpg);
        }

        @media screen and (max-width: 768px) {

            #accounts .display.features #features_block_hack,
            #accounts .display.features #features_block_hack .feature.full-width .thumbnail,
            #accounts .display.features #features_block_hack .feature.full-width .body {
                width: 100%;
            }

            #accounts .display.features #features_block_hack .feature.full-width .thumbnail {
                max-height: 360px;
            }

            #accounts .display.features #features_block_hack .feature.full-width .body {
                margin-top: 25px;
            }
        }

                 
        #accounts .display.features div.wrapper .oppcategory:hover {
            background-color: #F78715;
        }

       

       

        a.dugme,
        input.dugme,
        span.dugme,
        .dugme .dugme-over {
            -ms-filter: none;
            filter: none;
            background: #F78715;
        }

        #bittop .account-nav li ul li a:hover,
         .listdugmes .dugme
       {
            color: #F78715;
        }


        body,
        #footer {
            color: #333333;
        }

        .box h3,
        .box h4 {
            color: #333333;
        }

    </style>
    
 


<div id="accounts" class="displaymode" style="zoom: 1;">
    <div id="outerwrapper" class="blocks1">
        <div id="header">
            <div class="mod_site_title">
                <div class="kontainer">
                    
                    <div id="bittop" class="cf">
                        <div id="account-links">
                            <div class="social-links-top">
                                <!--<div class="social-links-top--prompt small">Follow</div>
                                <a href="https://www.facebook.com/nsvolonterskiservis" target="_blank"><img class="social-top" src="images/icon-facebook.png" alt="Facebook"></a>
                                <a href="https://www.instagram.com/nsvolonterskiservis" target="_blank"><img class="social-top" src="images/icon-instagram.png" alt="Instagram"></a>-->
                                <?php
                                  
                                    if(!isset($_SESSION['customer_email'])){

                                        //echo  "<a class='dugme' href='' >Dobrodošli :Gost</a>";

                                    }else{

                                        echo  "<a class='dugme' href='' >Dobrodošli : " . $_SESSION['customer_email'] . "</a>";

                                    }

                                ?>
                            </div>
                            <div class="account-dugmes-top">
                            
                                <?php 
                                
                                    if(!isset($_SESSION['customer_email'])){

                                        echo "<a class='dugme' href='customer_register.php' >Registracija</a>";
                                        echo "<a class='dugme' href='checkout.php' >Prijava</a>";
                                        
                                    } else {

                                        echo "<a class='dugme' href='customer/index.php?my_wishlist'>Moj nalog</a>";
                                    }

                                ?>
                            
                            </div>
                        </div>
                        <div id="logo">
                            <a href="index.php"><img  src="images/logo_large.png" alt="NVS" title="NVS" /></a>
                        </div>
                        
                        <script type="text/javascript">
                           /* var $jq = jQuery.noConflict();*/
                            $(document).ready(function() {
                                $(".nav-stack").click(function() {
                                    $(".nav-stack,.primary-nav").toggleClass("open");
                                });
                                $(".parent").click(function() {
                                    $(".parent ul").toggleClass("submenu");
                                });
                            });

                        </script>
                        
                        <nav id="responsive-nav" class="cf">
                            <div class="nav-dugmes">
                                <div class="nav-stack"><img src="images/cos-nav-stack.png" alt="Navigation"></div>
                            </div>
                            <div class="account-dugmes">
                                <div id="mobile-account-links">
                                    
                                    <div class="account-dugmes-top">
                                <?php 
                                
                                    if(!isset($_SESSION['customer_email'])){

                                        echo "<a class='dugme' href='customer_register.php' >Registracija</a>";
                                        echo "<a class='dugme' href='checkout.php' >Prijava</a>";
                                        
                                    } else {

                                        echo "<a class='dugme' href='customer/index.php?my_wishlist'>Moj nalog</a>";
                                    }

                                ?>
                                    </div>
                                </div>
                            </div>
                        </nav>
                        <ul id="account-nav" class="account-nav dropmenu primary-nav">
                            <li class=" parent"><a  class="tab" href="index.php">Home</a></li>
                            <?php 
                                if ($page=="shop"){
                                    echo "<li class='selected'>";
                                }else {
                                    echo "<li class=' parent'>";
                                }
                            ?>        
                                <a  class="tab" href="shop.php">Volonterske ponude</a></li>
                            
                            <?php 
                                if ($page=="org"){
                                    echo "<li class='selected'>";
                                }else {
                                    echo "<li class=' parent'>";
                                }
                            ?>                            
                                <a  class="tab" href="org.php">Organizacije</a></li>
                            
                            
                            <?php 
                                if ($page=="blog"){
                                    echo "<li class='selected'>";
                                }else {
                                    echo "<li class=' parent'>";
                                }
                            ?> 
                                <a  class="tab" href="blog.php">Blog</a></li>
                                
                            <?php 
                                if ($page=="about" or $page=="services" or $page=="contact"){
                                    echo "<li class='selected'>";
                                }else {
                                    echo "<li class=' parent'>";
                                }
                            ?>   
                                <a  class="tab" href="javascript:void(0)">O nama</a>
                                <ul id="">
                                    <li><a id="" href="about.php">NVS</a></li>
                                    <li><a id="" href="services.php">Aktuelno</a></li>
                                    <li><a id="" href="docs.php">Dokumenti</a></li>
                                    <li><a id="" href="contact.php">Kontakt</a></li>
                                </ul>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>

        </div><!-- end #header -->
        
        <div id="kontainer">
            <div id="wrapper">
                <div id="kontent">
                    <div id="main">
                        <div class="display accounts account features">

                            <div class="body">
                                <div class="kontent">
                                    <div class="header">
                            <?php    
                                if ($page=="shop"){ echo "<h1>Najnovije volonterske pozicije</h1>";}
                                if (strpos($page,'ponuda') !== false){ echo "<h1>Detalji ponude</h1>";}
                                if (strpos($page,'pozicija') !== false){ echo "<h1>Detalji ponude</h1>";}
                                if ($page=="org"){ echo "<h1>Organizacije</h1>";}
                                if (strpos($page,'blog') !== false){ echo "<h1>Vesti</h1>";}
                                if ($page=="about"){ echo "<h1>Novosadski Volonterski Servis</h1>";}
                                if ($page=="services"){ echo "<h1>Aktuelna dešavanja</h1>";}
                                if ($page=="docs"){ echo "<h1>Dokumenti</h1>";}
                                if ($page=="contact"){ echo "<h1>Kontaktirajte nas</h1>";}
                                if (strpos($page,'register') !== false){ echo "<h1>Registracija</h1>";}
                                if (strpos($page,'check') !== false){ echo "<h1>Prijava</h1>";}
                                if ($page=="terms"){ echo "<h1>Uslovi i pravila</h1>";}
                                if ($page=="forgot_pass"){ echo "<h1>Nova lozinka</h1>";}       
                            ?>
                                        
                                      <!--  <div id="header_join_dugme"><a class="dugme" href="customer_register.php">PRIKLJUČI SE</a></div> -->
                                    </div>

                                    <div class="inner cf"></div>
                                    
                                    
                                </div>
                            </div>
    


                        </div><!-- end .content -->

                    </div><!-- end .body -->
                </div><!-- end .account -->
            </div><!-- end #main -->
        </div><!-- end #content -->
    </div><!-- end #wrapper -->
   
   </div>
   <div style="clear:both;"></div>
