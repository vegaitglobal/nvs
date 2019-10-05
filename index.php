<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

?>
<!DOCTYPE html>
<html lang="sr-SP">

<head>
    <title>NVS</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="nvs, volontiranje"/>
<!--       
    <link rel="shortcut icon" href="" type="image/x-icon" />
    <link rel="icon" href="" type="image/x-icon" /    >
     -->
    <meta name="viewport" content="initial-scale=1.0, width=device-width, shrink-to-fit=no" />
    <meta name="description" content=" Novosadski volonterski Servis" />
       
        <link rel="stylesheet" title="" type="text/css" href="styles/font-awesome.min.css" media="all" />
        <link rel="stylesheet" title="" type="text/css" href="styles/dropmenu.css" media="all" />
        
   <!--     <link rel="stylesheet" title="" type="text/css" href="styles/slick.css" media="all" />  -->

         
        <link rel="stylesheet" title="" type="text/css" href="styles/cos.css" media="all" /> 
        <link rel="stylesheet" title="" type="text/css" href="styles/service.css" media="all" /> 
    
        <link rel="stylesheet" title="" type="text/css" href="styles/box.css" media="all" />
 
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic);

        body,
        select,
       /*  
    
        form .row .add .button-over, */
         div {
            font-family: "Open Sans", sans-serif !important;
        }

    <?php
        $get_sliders = "select * from slider";

        $run_sliders = mysqli_query($con, $get_sliders);

          $od = array(
                "#75AAD6",
                "#87B787",
                "rgba(255, 250, 230, 1)",
                "#FFC4E2",
                "#9681AD",
                "#BC8F8D"
            );
            
            $do = array(
                "#0275D3",
                "#10B510",
                "rgba(247, 135, 21, 1)",
                "#FF0280",
                "#5B16AA",
                "#BA0F09"
            );

            $i = 0;

            while ($sliders_section=mysqli_fetch_array($run_sliders)) {
                ?>  
        #accounts .display.features #features_block .feature .overlay_<?php echo $i; ?> {
             position: absolute;
            top: 0;
            left: 0;
            display: block;
            background-image: linear-gradient(<?php echo $od[$i];?>,<?php echo $do[$i];?>) ;  
            opacity: .45;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=45)";
            width: 100%;
            height: 100%;                              
          
          }
                <?php $i = $i+1;
                if ($i>5) {
                    $i=0;
                }  ?>
            <?php } ?>    
            
 

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

    </style>



  
 
   <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script> 
    
    
    <script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="js/jquery.jcarousel-control.min.js"></script>
    
  <!--  
   <script type="text/javascript" src="js/jquery-ui111.min.js?1010"></script>
   <script type="text/javascript" src="js/slick.min.js?1010"></script>
   <script type="text/javascript" src="js/jquery.waypoints.min.js?1010"></script>
    <script type="text/javascript" src="js/inview.min.js?1010"></script>
    <script type="text/javascript" src="js/BitCardDeck.js"></script> ->


    
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="keywords" content="" />
   <!-- 
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
-->

    <style type="text/css">
        
        #footer,
        #accounts .display.features div.wrapper .oppcategory:hover {
            background-color: #F78715;
        }

       

        #contact_form input[type=text],
        #contact_form textarea {
            background-color: rgba(247, 135, 21, .35);
        }


        a.button,
        input.button,
        span.button,
        .button .button-over {
            -ms-filter: none;
            filter: none;
            background: #F78715;
        }

        #bittop .account-nav li ul li a:hover,
         .listbuttons .button,
        a:link,
        a:active,
        a:visited {
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
    
 
    
    <!--[if IE]><style type="text/css">#triplebox, .box {background:transparent;-ms-filter:"progid:DXImageTransform.Microsoft.gradient(startColorstr=#B2F78715,endColorstr=#B2F78715)";filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#B2F78715,endColorstr=#B2F78715);zoom: 1;}#contact_form input[type=text],#contact_form textarea {background: transparent;-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#59F78715,endColorstr=#59F78715)"; /* IE8 */filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#59F78715,endColorstr=#59F78715);   /* IE6 & 7 */zoom: 1;}</style><![endif]-->
</head>

<body  id="accounts" class="displaymode" style="zoom: 1;">
    <div id="outerwrapper" class="blocks1">
        <div id="header">
            <div class="mod_site_title">
                <div class="container">
                    
                    <div id="bittop" class="cf">
                        <div id="account-links">
                            <div class="social-links-top">
                                <!--<div class="social-links-top--prompt small">Follow</div>-->
                                <a href="https://www.facebook.com/nsvolonterskiservis" target="_blank"><img class="social-top" src="images/icon-facebook.png" alt="Facebook"></a>
                                <a href="https://www.instagram.com/nsvolonterskiservis" target="_blank"><img class="social-top" src="images/icon-instagram.png" alt="Instagram"></a>
                            </div>
                            <div class="account-buttons-top">
                            
                                <?php

                                if (!isset($_SESSION['customer_email'])) {
                                    echo "<a class='button' href='checkout.php' >Prijava</a>";
                                } else {
                                    echo "<a class='button' href='customer/index.php?my_wishlist'>Moj nalog</a>";
                                }

                                ?>
                            
                            </div>
                        </div>
                        <div id="logo">
                            <div class="att-plugin"><a href="/"><img class="thumb" src="images/logo_large.png" alt="NVS" title="NVS" /></a></div>
                        </div>
                        
                        <script type="text/javascript">
                           $jq = jQuery.noConflict();
                            $jq(document).ready(function() {
                                $jq(".nav-stack").click(function() {
                                    $jq(".nav-stack,.primary-nav").toggleClass("open");
                                });
                                $jq(".parent").click(function() {
                                    $jq(".parent ul").toggleClass("submenu");
                                });
                            });
                            
                        </script>
                        
                        <nav id="responsive-nav" class="cf">
                            <div class="nav-buttons">
                                <div class="nav-stack"><img src="images/cos-nav-stack.png" alt="Navigation"></div>
                            </div>
                            <div class="account-buttons">
                                <div id="mobile-account-links">
                                    
                                    <div class="account-buttons-top">
                                            <?php

                                            if (!isset($_SESSION['customer_email'])) {
                                                echo "<a class='button' href='checkout.php' >Prijava</a>";
                                            } else {
                                                echo "<a class='button' href='customer/index.php?my_wishlist'>Moj nalog</a>";
                                            }

                                            ?>
                                    </div>
                                </div>
                            </div>
                        </nav>
                        <ul id="account-nav" class="account-nav dropmenu primary-nav">
                            <li class="selected "><a id="account-nav_accounts_menu_list_tab_1" class="tab" href="">Home</a></li>
                            <li class=" parent"><a id="account-nav_accounts_menu_list_tab_2" class="tab" href="shop.php">Volonterske ponude</a></li>
                            <li class=" parent"><a id="account-nav_accounts_menu_list_tab_11" class="tab" href="org.php">Organizacije</a></li>
                            <li class=" parent"><a id="account-nav_accounts_menu_list_tab_18" class="tab" href="blog.php">Blog</a></li>
                            <li class=" parent"><a id="" class="tab" href="javascript:void(0)">O nama</a>
                                <ul id="" >
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
        
        <div id="container">
            <div id="wrapper">
                <div id="content">
                    <div id="main">
                        <div class="display accounts account features carddecks">

                            <div class="body">
                                <div class="content">
                                    <div class="header">
                                        <h1>VOLONTIRANJE JE STVAR SRCA <br> </h1>
                                        <div id="header_join_button"><a class="button" href="customer_register.php">PRIKLJUČI SE</a></div>
                                    </div>

                                    <div class="inner cf">

                                        <style>
                                            .jcarousel-wrapper {
                                                padding: 10px 0;
                                                position: relative;
                                                background: white;
                                            }

                                            /** Carousel **/

                                            .jcarousel {
                                                position: relative;
                                                overflow: hidden;
                                                width: 100%;
                                            }

                                            .jcarousel ul {
                                                width: 20000em;
                                                position: relative;
                                                list-style: none;
                                                margin: 0;
                                                padding: 0;
                                            }

                                            .jcarousel li {
                                                float: left;
                                                border-left: 10px solid #fff;
                                                -moz-box-sizing: border-box;
                                                -webkit-box-sizing: border-box;
                                                box-sizing: border-box;
                                            }

                                            .jcarousel li:first-child {
                                                border-left: none;
                                            }

                                            .jcarousel img {
                                                display: block;
                                                height: 340px;
                                                width: auto;
                                            }

                                            /* in case there's only one image */
                                            .jcarousel.single {
                                                width: 945px;
                                                margin: 0 auto;
                                            }

                                            /** Carousel Controls **/

                                            a.jcarousel-control-prev,
                                            a.jcarousel-control-next {
                                                position: absolute;
                                                top: 50%;
                                                margin-top: -34px;
                                                width: 44px;
                                                height: 68px;
                                                text-align: center;
                                                background: #f78715;
                                                opacity: .8;
                                                color: #fff;
                                                text-decoration: none !important;
                                                font: 84px/50px Arial, sans-serif;
                                            }

                                            .jcarousel-control-prev {
                                                left: 0;
                                            }

                                            .jcarousel-control-next {
                                                right: 0;
                                            }

                                            /** Carousel Pagination **/

                                            .jcarousel-pagination {
                                                position: absolute;
                                                bottom: -40px;
                                                left: 50%;
                                                -webkit-transform: translate(-50%, 0);
                                                -ms-transform: translate(-50%, 0);
                                                transform: translate(-50%, 0);
                                                margin: 0;
                                            }

                                            .jcarousel-pagination a {
                                                text-decoration: none;
                                                display: inline-block;

                                                font-size: 11px;
                                                height: 10px;
                                                width: 10px;
                                                line-height: 10px;

                                                background: #fff;
                                                color: #4E443C;
                                                border-radius: 10px;
                                                text-indent: -9999px;

                                                margin-right: 7px;


                                                -webkit-box-shadow: 0 0 2px #4E443C;
                                                -moz-box-shadow: 0 0 2px #4E443C;
                                                box-shadow: 0 0 2px #4E443C;
                                            }

                                            .jcarousel-pagination a.active {
                                                background: #4E443C;
                                                color: #fff;
                                                opacity: 1;

                                                -webkit-box-shadow: 0 0 2px #F0EFE7;
                                                -moz-box-shadow: 0 0 2px #F0EFE7;
                                                box-shadow: 0 0 2px #F0EFE7;
                                            }

                                            @media all and (max-width: 768px) {
                                                .jcarousel li {
                                                    border-left: none;
                                                }

                                                /* in case there's only one image */
                                                .jcarousel.single {
                                                    width: 100%
                                                }
                                            }
                                        </style>
                                        <div id="features_block">
                                            <div class="jcarousel-wrapper">
                                                <div class="jcarousel">
                                                    <ul class="features">

                                                        <?php

                                                        $get_slides = "select * from slider";

                                                        $run_slides = mysqli_query($con, $get_slides);
                                                        
                                                        $i=0;
                                                        
                                                        while ($row_slides = mysqli_fetch_array($run_slides)) {
                                                            $slide_name = $row_slides['slide_name'];

                                                            $slide_image = $row_slides['slide_image'];

                                                            $slide_url = $row_slides['slide_url'];
                                                            
                                                            echo "<li>";
                                                            echo "<a href='$slide_url'>";
                                                            echo "<div class='feature' style='background:url(admin_area/slides_images/$slide_image) no-repeat; background-size:contain'>";
                                                            echo  "<span class='overlay_$i'></span>";
                                                            echo "</a>";
                                                            echo "<div class='body'>";
                                                            echo "<h3><a href='$slide_url'>$slide_name</a></h3>";
                                                            echo "<a href='$slide_url' class='learnMore'>Saznajte više</a>";
                                                            echo "</div>";
                                                            echo "</div>";
                                                            echo "</li>";
                                                            $i = $i+1;
                                                            if ($i>5) {
                                                                $i=0;
                                                            }
                                                        }
                                                        ?>

                                                    </ul>
                                                </div><a href="#" class="jcarousel-control-prev">&lsaquo;</a><a href="#" class="jcarousel-control-next">&rsaquo;</a>
                                            </div>
                                        </div>
                                    </div>

                                    <script type='text/javascript'>
                                        // Important note! If you're adding CSS3 transition to slides, fadeInLoadedSlide should be disabled to avoid fade-conflicts.
                                        var $jq = jQuery.noConflict();
                                        $jq(document).ready(function($) {
                                            //how many features do we have?
                                            var jcarousel = $('.jcarousel');
                                            var totalFeatures = $(".jcarousel li").length;
                                            //alert(totalFeatures);
                                            //hide nav arrows if there's only one item
                                            if (totalFeatures < 2) {
                                                $('.jcarousel-control-prev').css("display", "none");
                                                $('.jcarousel-control-next').css("display", "none");
                                                $('.jcarousel').addClass("single");
                                            }
                                            //alert(jcarousel.innerWidth());
                                            function hideControls() {
                                                $('.jcarousel-control-prev').css("display", "none");
                                                $('.jcarousel-control-next').css("display", "none");
                                            }

                                            function showControls() {
                                                $('.jcarousel-control-prev').css("display", "block");
                                                $('.jcarousel-control-next').css("display", "block");
                                            }

                                            jcarousel
                                                .on('jcarousel:reload jcarousel:create', function() {
                                                    var width = jcarousel.innerWidth();



                                                    if (width > 900 && totalFeatures > 2) {
                                                        width = width / 3;
                                                        if (totalFeatures == 3) {
                                                            hideControls();
                                                        }
                                                    } else if (width > 900 && totalFeatures == 2) {
                                                        width = width / 2;
                                                        hideControls();
                                                    } else if (width > 600) {
                                                        if (totalFeatures >= 2) {
                                                            showControls();
                                                        }
                                                    }

                                                    jcarousel.jcarousel('items').css('width', width + 'px');
                                                })
                                                .jcarousel({
                                                    wrap: 'circular'
                                                })
                                                .jcarouselAutoscroll({
                                                    interval: 5000
                                                })
                                                .hover(function() {
                                                    $(this).jcarouselAutoscroll('stop');
                                                    //$('.jcarousel-control-prev').fadeIn();
                                                    //$('.jcarousel-control-next').fadeIn();
                                                }, function() {
                                                    $(this).jcarouselAutoscroll('start');
                                                    //$('.jcarousel-control-prev').fadeOut();
                                                    //$('.jcarousel-control-next').fadeOut();
                                                });

                                            $('.jcarousel-control-prev')
                                                .jcarouselControl({
                                                    target: '-=1'
                                                });

                                            $('.jcarousel-control-next')
                                                .jcarouselControl({
                                                    target: '+=1'
                                                });
                                        });
                                    </script>
                                    <div style="clear:both;"></div>
                                </div>
                            </div>
                            <!-- card decks -->
                             <div id="homepage_carddeck_callout">DOGAĐAJI</div>
                            <div style="clear:both;"></div>
                           
                                 <main>

                                <?php

                                $get_boxes = "select * from boxes_section";

                                $run_boxes = mysqli_query($con, $get_boxes);

                                $boja = array(
                                        "224,158,147",
                                        "236,241,239",
                                        "166,144,235",
                                        "128,191,235",
                                        "213,131,180",
                                        "243,214,125"
                                    );

                                $i = 0;

                                while ($run_boxes_section=mysqli_fetch_array($run_boxes)) {
                                    $box_id = $run_boxes_section['box_id'];

                                    $box_title = $run_boxes_section['box_title'];

                                    $box_desc = $run_boxes_section['box_desc'];

                                    $box_url = $run_boxes_section['box_url'];



                                    ?>

                                <article class="card" style="background-color:rgb(<?php echo $boja[$i]; ?>)">


                                    <!-- <div class="carddeck--number"></div> -->
                                    <div class="carddeck--title"><?php echo $box_title; ?></div>
                                    <div class="card--title"><?php echo $box_desc; ?></div>
                                    <div class="card--link "><a class="button" href="<?php echo $box_url; ?>" data-card-title="<?php echo $box_desc; ?>">Saznajte više</a></div>
                                    <div class="card--count"></div>


                                </article>


                                    <?php $i = $i+1;
                                    if ($i>5) {
                                        $i=0;
                                    }  ?>
                                <?php } ?>

                            </main><!-- custom content -->



                        </div><!-- end .content -->

                    </div><!-- end .body -->
                </div><!-- end .account -->
            </div><!-- end #main -->
        </div><!-- end #content -->
    </div><!-- end #wrapper -->
   
   
    <div style="clear:both">&nbsp;</div>
    <!-- end #container -->
  
        
    <footer class="deals" ><!-- footer Starts -->
  

           <article>
                 <h4>Novosadski volonterski servis</h4>
                <a class= "footer_links" href="contact.php">Kontakt</a>                
                <hr>

                <h4>Korisnički kutak</h4>
                    <?php

                    if (!isset($_SESSION['customer_email'])) {
                        echo "<a class= 'footer_links' href='checkout.php' >Prijava</a>";
                    } else {
                        echo "<a class= 'footer_links' href='customer/index.php?my_wishlist'>Moj nalog</a>";
                    }
                    ?>

                <a class= "footer_links" href="customer_register.php">Registracija</a>
                 <a class= "footer_links" href="terms.php">Uslovi i pravila </a>
                <hr>
          </article>
        

         
         <article>
             <a href="http://www.novisad.rs/">            
                <img src="images/GradNS.png" class="img-responsive" alt="">
            </a>
            <hr>                        
         </article>

            
          <article>
             <a href="http://opens2019.rs/">            
                <img src="images/prestonica_mladih.png" class="img-responsive" alt="">
            </a> 
            <hr>
            <a href="http://novisad2021.rs/">            
                <img src="images/220px-European_Capital_of_Culture_logo.png" class="img-responsive" alt="">
            </a>         
            <hr>     
         
         </article>
 
        <article >
          
           <h4> Budite u kontaktu </h4>
            <div >
            <span class="social-links"><!-- social Starts --->
                <a href="https://www.facebook.com/nsvolonterskiservis" target="_blank"><img class="social-top" src="images/icon-facebook.png" alt="Facebook"></a>
                <a href="https://www.instagram.com/nsvolonterskiservis" target="_blank"><img class="social-top" src="images/icon-instagram.png" alt="Instagram"></a>      
                <a href="https://plus.google.com/u/1/102385802968737513139"><img class="social-top" src="images/icon-google-plus.png" alt="Instagram"></a>
                <a href="https://www.nvs.rs/contact.php"><img class="social-top" src="images/icon-mail.png" alt="Instagram"></a>
            </span>
            </div><!-- social Ends --->   

         </article>
        
        </footer>
        
    
   

  
   
   


    <div id="spinner" style="z-index:1501; position:absolute; height: 50px; width:250px; line-height:50px; padding:25px 0; text-align:center; display:none;"><img src="images/busy.gif" alt="Loading" title="Loading" style="vertical-align:middle;" class="icon" width="32" height="32" />&nbsp;&nbsp;&nbsp;&nbsp;Loading&hellip;</div>
    <div id="spinner_overlay" style="z-index:1500;position:fixed;top:0px;left:0px;height:100%;width:100%;display:none;"></div>



</body>

</html>
