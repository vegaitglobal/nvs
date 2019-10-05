<?php


if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <!-- navbar navbar-inverse navbar-fixed-top Starts -->

        <div class="navbar-header">
            <!-- navbar-header Starts -->

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><!-- navbar-ex1-collapse Starts -->


                <span class="sr-only" >Toggle Navigation</span>

                <span class="icon-bar" ></span>

                <span class="icon-bar" ></span>

                <span class="icon-bar" ></span>


            </button>
            <!-- navbar-ex1-collapse Ends -->

            <a class="navbar-brand" href="index.php?path=dashboard">Admin Panel</a>


        </div>
        <!-- navbar-header Ends -->

        <ul class="nav navbar-right top-nav">
            <!-- nav navbar-right top-nav Starts -->

            <li class="dropdown">
                <!-- dropdown Starts -->

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- dropdown-toggle Starts -->

                    <i class="fa fa-user"></i>

                    <?php echo $admin_name; ?> <b class="caret"></b>


                </a>
                <!-- dropdown-toggle Ends -->

                <ul class="dropdown-menu">
                    <!-- dropdown-menu Starts -->

                    <li>
                        <!-- li Starts -->

                        <a href="index.php?path=user_profile&user_profile=<?php echo $admin_id; ?>">

                            <i class="fa fa-fw fa-user" ></i> Profil


                        </a>

                    </li>
                    <!-- li Ends -->

                    <li>

                        <a href="index.php?path=view_orders">

                            <i class="fa fa-fw fa-list"></i> Nove prijave

                        </a>

                    </li>

                    <li>
                        <!-- li Starts -->

                        <a href="index.php?path=view_products">

                            <i class="fa fa-fw fa-envelope" ></i> Pozicija

                            <span class="badge" ><?php echo $count_products; ?></span>


                            </a>

                    </li>
                    <!-- li Ends -->

                    <li>
                        <!-- li Starts -->

                        <a href="index.php?path=view_customers">

                        <i class="fa fa-fw fa-gear" ></i> Volonteri

                        <span class="badge" ><?php echo $count_volunteers; ?></span>


                        </a>

                    </li>
                    <!-- li Ends -->

                    <li>
                        <!-- li Starts -->

                        <a href="index.php?path=view_p_cats">

                            <i class="fa fa-fw fa-gear" ></i> Programi

                            <span class="badge" ><?php echo $count_p_categories; ?></span>


                            </a>

                    </li>
                    <!-- li Ends -->

                    <li class="divider"></li>

                    <li>
                        <!-- li Starts -->

                        <a href="logout.php">

                        <i class="fa fa-fw fa-power-off"> </i> Odjava

                        </a>

                    </li>
                    <!-- li Ends -->

                </ul>
                <!-- dropdown-menu Ends -->




            </li>
            <!-- dropdown Ends -->


        </ul>
        <!-- nav navbar-right top-nav Ends -->

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <!-- collapse navbar-collapse navbar-ex1-collapse Starts -->

            <ul class="nav navbar-nav side-nav">
                <!-- nav navbar-nav side-nav Starts -->

                <li>
                    <!-- li Starts -->

                    <a href="index.php?path=dashboard">

                    <i class="fa fa-fw fa-dashboard"></i> Dashboard

                    </a>

                </li>
                <!-- li Ends -->

                <li>
                    <!-- Products li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#products">

                    <i class="fa fa-fw fa-table"></i> Pozicije

                    <i class="fa fa-fw fa-caret-down"></i>


                    </a>

                    <ul id="products" class="collapse">

                        <li>
                            <a href="index.php?path=insert_product"> Unos pozicije </a>
                        </li>

                        <li>
                            <a href="index.php?path=view_products"> Pregled pozicije </a>
                        </li>


                    </ul>

                </li>
                <!-- Products li Ends -->

                <li>
                    <!-- manufacturer li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#organizations">
                        <!-- anchor Starts -->

                        <i class="fa fa-fw fa-briefcase"></i> Organizacije

                        <i class="fa fa-fw fa-caret-down"></i>


                    </a>
                    <!-- anchor Ends -->

                    <ul id="organizations" class="collapse">
                        <!-- ul collapse Starts -->

                        <li>
                            <a href="index.php?path=insert_manufacturer"> Unos organizacije </a>
                        </li>

                        <li>
                            <a href="index.php?path=view_manufacturers"> Pogledaj organizations </a>
                        </li>

                    </ul>
                    <!-- ul collapse Ends -->


                </li>
                <!-- manufacturer li Ends -->


                <li>
                    <!-- li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#p_cat">

                    <i class="fa fa-fw fa-pencil"></i> Programi

                    <i class="fa fa-fw fa-caret-down"></i>


                    </a>

                    <ul id="p_cat" class="collapse">

                        <li>
                            <a href="index.php?path=insert_p_cat"> Unos programa </a>
                        </li>

                        <li>
                            <a href="index.php?path=view_p_cats"> Pregled programa </a>
                        </li>


                    </ul>

                </li>
                <!-- li Ends -->


                <li>
                    <!-- li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#cat">

                    <i class="fa fa-fw fa-arrows-v"></i> Oblasti

                    <i class="fa fa-fw fa-caret-down"></i>

                    </a>

                    <ul id="cat" class="collapse">

                        <li>
                            <a href="index.php?path=insert_cat"> Unos oblasti interesovanja </a>
                        </li>

                        <li>
                            <a href="index.php?path=view_cats"> Pregled oblasti </a>
                        </li>


                    </ul>

                </li>
                <!-- li Ends -->

                <li>

                    <a href="index.php?path=view_customers">

                    <i class="fa fa-fw fa-edit"></i> Volonteri

                    </a>

                </li>

                <li>

                    <a href="index.php?path=view_orders">

                    <i class="fa fa-fw fa-list"></i> Prijave

                    </a>

                    </li>

                  <li>
                    <!-- Logs li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#blog">

                    <i class="fa fa-fw fa-book"></i> BLOG

                    <i class="fa fa-fw fa-caret-down"></i>


                    </a>

                    <ul id="blog" class="collapse">

                        <li>
                            <a href="index.php?path=insert_post"> Unos bloga </a>
                        </li>

                        <li>
                            <a href="index.php?path=view_posts"> Pregled bloga </a>
                        </li>


                    </ul>

                </li>
                <!-- Products li Ends -->
               
               
                <li>
                    <!-- boxes section li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#boxes">
                        <!-- anchor Starts -->

                        <i class="fa fa-fw fa-arrows"></i> Boxes Section

                        <i class="fa fa-fw fa-caret-down"></i>

                    </a>
                    <!-- anchor Ends -->

                    <ul id="boxes" class="collapse">

                        <li>

                            <a href="index.php?path=insert_box"> Unesi Box </a>

                        </li>


                        <li>

                            <a href="index.php?path=view_boxes"> Pregled Boxa </a>

                        </li>

                    </ul>

                </li>
                <!--boxes section li Ends -->

                <li>
                    <!-- services section li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#services">

                        <i class="fa fa-fw fa-briefcase"></i> Usluge

                        <i class="fa fa-fw fa-caret-down"></i>

                        </a>

                    <ul id="services" class="collapse">

                        <li>
                            <a href="index.php?path=insert_service"> Unesi uslugu </a>
                        </li>

                        <li>
                            <a href="index.php?path=view_services"> Pregled usluge </a>
                        </li>

                    </ul>

                </li>
                <!-- services section li Ends -->


                <li>
                    <!-- contact us li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#contact_us">
                        <!-- anchor Starts -->

                        <i class="fa fa-fw fa-pencil"> </i> Kontakt

                        <i class="fa fa-fw fa-caret-down"></i>

                    </a>
                    <!-- anchor Ends -->

                    <ul id="contact_us" class="collapse">

                        <li>

                            <a href="index.php?path=edit_contact_us"> Ažuriranje kontakta </a>

                        </li>

                    </ul>

                </li>
                <!-- contact us li Ends -->

                <li>
                    <!-- about us li Starts -->

                    <a href="index.php?edit_about_us">

                    <i class="fa fa-fw fa-edit"></i> Promeni O Nama

                    </a>

                </li>
                <!-- about us li Ends -->

                 <li>
                    <!-- manufacturer li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#docs">
                        <!-- anchor Starts -->

                        <i class="fa fa-fw fa-server"></i> Dokumenti

                        <i class="fa fa-fw fa-caret-down"></i>


                    </a>
                    <!-- anchor Ends -->

                    <ul id="docs" class="collapse">
                        <!-- ul collapse Starts -->

                        <li>
                            <a href="index.php?path=insert_docs"> Unos dokumenta </a>
                        </li>

                        <li>
                            <a href="index.php?path=view_docs"> Pregledaj dokumente </a>
                        </li>

                    </ul>
                    <!-- ul collapse Ends -->


                </li>
                <!-- manufacturer li Ends -->


                <li>
                    <!-- slide li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#slides">

                    <i class="fa fa-fw fa-gear"></i> Slajdovi

                    <i class="fa fa-fw fa-caret-down"></i>


                    </a>

                    <ul id="slides" class="collapse">

                        <li>
                            <a href="index.php?path=insert_slide"> Unesi slajd </a>
                        </li>

                        <li>
                            <a href="index.php?path=view_slides"> Pregled slajdova </a>
                        </li>


                    </ul>

                </li>
                <!-- slide li Ends -->

                <li>
                    <!-- Icons Li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#icons">

                        <i class="fa fa-fw fa-retweet"> </i> Ikonice

                        <i class="fa fa-fw fa-caret-down" ></i>

                        </a>

                    <ul id="icons" class="collapse">
                        <!-- Icons Ul Starts -->

                        <li>
                            <a href="index.php?path=insert_icon"> Unes ikonicu </a>
                        </li>


                        <li>
                            <a href="index.php?path=view_icons"> Pregled ikonica </a>
                        </li>

                    </ul>
                    <!-- Icons Ul Ends -->

                </li>
                <!-- Icons Li Ends -->

                <li>
                    <!-- terms li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#terms">
                        <!-- anchor Starts -->

                        <i class="fa fa-fw fa-table"></i> Uslovi korišćenja

                        <i class="fa fa-fw fa-caret-down"></i>

                    </a>
                    <!-- anchor Ends -->

                    <ul id="terms" class="collapse">
                        <!-- ul collapse Starts -->

                        <li>
                            <a href="index.php?path=insert_term"> Unos uslova </a>
                        </li>

                        <li>
                            <a href="index.php?path=view_terms"> Pregled uslovas </a>
                        </li>

                    </ul>
                    <!-- ul collapse Ends -->


                </li>
                <!-- terms li Ends -->

                <li>
                    <!-- Edit Css li Starts -->

                    <a href="index.php?path=edit_css">

                    <i class="fa fa-fw fa-list"></i> Uređivanje Css fajla

                    </a>

                </li>
                <!-- Edit Css li Ends -->





                <li>
                    <!-- li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#users">

                    <i class="fa fa-fw fa-gear"></i> Administratori

                    <i class="fa fa-fw fa-caret-down"></i>


                    </a>

                    <ul id="users" class="collapse">

                        <li>
                            <a href="index.php?path=insert_user"> Unos administratora </a>
                        </li>

                        <li>
                            <a href="index.php?path=view_users"> Pregledaj administratore </a>
                        </li>

                        <li>
                            <a href="index.php?path=user_profile&user_profile=<?php echo $admin_id; ?>"> Uredi Profil </a>
                        </li>

                    </ul>

                </li>
                <!-- li Ends -->

                <li>
                    <!-- li Starts -->

                    <a href="logout.php">

                    <i class="fa fa-fw fa-power-off"></i> Odjava

                    </a>

                </li>
                <!-- li Ends -->

            </ul>
            <!-- nav navbar-nav side-nav Ends -->

        </div>
        <!-- collapse navbar-collapse navbar-ex1-collapse Ends -->

    </nav>
    <!-- navbar navbar-inverse navbar-fixed-top Ends -->

<?php } ?>