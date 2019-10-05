<footer id="flexi" ><!-- footer Starts -->
  

           <article class="floxi">
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
        

         
         <article class="floxi">
             <a href="http://www.novisad.rs/">            
                <img src="images/GradNS.png" class="img-responsive" alt="">
            </a>
            <hr>                        
         </article>

            
          <article class="floxi">
             <a href="http://opens2019.rs/">            
                <img src="images/prestonica_mladih.png" class="img-responsive" alt="">
            </a> 
            <hr>
            <a href="http://novisad2021.rs/">            
                <img src="images/220px-European_Capital_of_Culture_logo.png" class="img-responsive" alt="">
            </a>         
            <hr>     
         
         </article>
 
        <article class="floxi" >
          
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

<div id="copyright"><!-- copyright Starts -->

    <div class="container" ><!-- container Starts -->

    <div class="col-md-6" ><!-- col-md-6 Starts -->

    <p class="pull-left"> &copy; 2018 Novosadski volonterski servis </p>

    </div><!-- col-md-6 Ends -->

    <div class="col-md-6" ><!-- col-md-6 Starts -->

    <p class="pull-right" >

    <!--Template by <a href="http://www.novisad2021.rs" >novisad2021.rs</a>--->

    </p>


    </div><!-- col-md-6 Ends -->

    </div><!-- container Ends -->

</div><!-- copyright Ends -->