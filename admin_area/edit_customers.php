<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


if(isset($_GET['edit_volunteers'])){

    $edit_id = $_GET['edit_volunteers'];

    $get_d = "select * from volunteers where customer_id='$edit_id'";

    $run_edit = mysqli_query($con,$get_d);

    $row_customer = mysqli_fetch_array($run_edit);

    $customer_id = $row_customer['customer_id'];

    $customer_name = $row_customer['customer_name'];

    $customer_email = $row_customer['customer_email'];

    $customer_country = $row_customer['customer_country'];

    $customer_city = $row_customer['customer_city'];

    $customer_contact = $row_customer['customer_contact'];

    $customer_address = $row_customer['customer_address'];

    $customer_image = $row_customer['customer_image'];
    $new_customer_image = $row_customer['customer_image'];

    $customer_cv = $row_customer['customer_cv'];
    $new_customer_cv = $row_customer['customer_cv'];

    $customer_motiv = $row_customer['customer_motiv'];
    $new_customer_motiv = $row_customer['customer_motiv'];

    $customer_datum = $row_customer['customer_datum'];

    $customer_pol = $row_customer['customer_pol'];

    $customer_sprema = $row_customer['customer_sprema'];

    $customer_profil = $row_customer['customer_profil'];

    $customer_desc = $row_customer['customer_desc'];

    $customer_vestina = $row_customer['customer_vestina'];
    
    $customer_sati = $row_customer['customer_sati'];
    
    $customer_eval = $row_customer['customer_eval'];
    
        $get_cat = "select * from categories where cat_id='$customer_profil'";

        $run_cat = mysqli_query($con,$get_cat);

        $row_cat = mysqli_fetch_array($run_cat);

        $cat_title = $row_cat['cat_title'];
}

?>

<div class="row"><!-- row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <ol class="breadcrumb"><!-- breadcrumb Starts -->

            <li class="active">

                <i class="fa fa-dashboard"> </i> Dashboard / Volonter

            </li>

        </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

    <h3 class="panel-title">

        <i class="fa fa-money fa-fw"></i> Provera volontera

    </h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
   
         
        
        <div class="form-group">
            <!-- form-group Starts -->

            <label class="col-md-3 control-label"> Ime i Prezime: </label>
            <div class="col-md-6">
                <input type="text" name="c_name" class="form-control" required value="<?php echo $customer_name; ?>">

            </div>
        </div><!-- form-group Ends -->
        
        
        <div class="form-group">
            <!-- form-group Starts -->

            <label class="col-md-3 control-label"> Volonterski Sati: </label>
            <div class="col-md-6">
                <input style="background-color : #deffbc;" type="text" name="c_sati" class="form-control" value="<?php echo $customer_sati; ?>">

            </div>
        </div><!-- form-group Ends -->
        
        
    <div class="form-group"><!-- form-group Starts -->

        <label class="col-md-3 control-label" > Evaulacija: </label>

        <div class="col-md-6" > 

            <textarea  style="background-color : #deffbc;" class="form-control" rows="5" name="c_eval"><?php echo $customer_eval;?></textarea>

        </div>

    </div><!-- form-group Ends -->

    <div class="form-group" ><!-- form-group Starts -->

        <label class="col-md-3 control-label"> Email: </label>

       <div class="col-md-6" > 
        <input type="text" name="c_email" class="form-control" required value="<?php echo $customer_email; ?>">
        </div>

    </div><!-- form-group Ends -->

    <div class="form-group" ><!-- form-group Starts -->

        <label class="col-md-3 control-label"> Država: </label>

       <div class="col-md-6" > 
        <input type="text" name="c_country" class="form-control" required value="<?php echo $customer_country; ?>">
        </div>

    </div><!-- form-group Ends -->

    <div class="form-group" ><!-- form-group Starts -->

        <label class="col-md-3 control-label"> Mesto: </label>

      <div class="col-md-6" > 
        <input type="text" name="c_city" class="form-control" required value="<?php echo $customer_city; ?>">
        </div>

    </div><!-- form-group Ends -->

    <div class="form-group" ><!-- form-group Starts -->

        <label class="col-md-3 control-label"> Telefon: </label>
        
        <div class="col-md-6" > 

        <input type="text" name="c_contact" class="form-control" required value="<?php echo $customer_contact; ?>">
        </div>

    </div><!-- form-group Ends -->

    <div class="form-group" ><!-- form-group Starts -->

        <label class="col-md-3 control-label"> Adresa: </label>
        
        <div class="col-md-6" > 

        <input type="text" name="c_address" class="form-control" required value="<?php echo $customer_address; ?>">
        </div>

    </div><!-- form-group Ends -->


         <div class="form-group"><!-- form-group Starts -->

            <label class="col-md-3 control-label"> Datum rođenja:</label>
            
            <div class="col-md-6" > 

            <input type="date" class="form-control" name="datum" value="<?php echo $customer_datum; ?>" required>
             </div>

        </div><!-- form-group Ends -->


        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" > Pol: </label>

            <div class="col-md-6" >

            <select name="pol" class="form-control" >
                <option value="<?php echo $customer_pol; ?>"><?php echo $customer_pol; ?></option>
                <option value="Muško">Muško</option>
                <option value="Žensko">Žensko</option>

            </select>

            </div>

        </div><!-- form-group Ends -->


        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" > Oblast interesovanja:</label>

            <div class="col-md-2" >


            <select name="oblast" class="form-control" style="opacity:0.5;" >

                <option value="<?php echo $customer_profil; ?>"><?php echo $customer_profil; ?></option>

                <?php

                $get_cat = "select * from categories ";

                $run_cat = mysqli_query($con,$get_cat);

                while ($row_cat=mysqli_fetch_array($run_cat)) {

                   $cat_title = $row_cat['cat_title'];

                    echo "<option value='$cat_title'>$cat_title</option>";

                }
                   echo "<option value='Sve'>Sve</option>";
                ?>
            </select>
             </div>
             <div class="col-md-4">
                <input type="text" class="form-control" value="<?php echo $customer_profil; ?>"  placeholder="ili upiši ovde ako nije navedeno" name="profil" required>
            </div>
       

        </div><!-- form-group Ends -->
        


        <div class="form-group" ><!-- form-group Starts -->

        <label class="col-md-3 control-label" > Školska sprema: </label>

        <div class="col-md-6" >


            <select name="sprema" class="form-control" >

                <option value="<?php echo $customer_sprema; ?>"><?php echo $customer_sprema; ?></option>
                <option value="Osnovno">Osnovno</option>
                <option value="Srednje">Srednje</option>
                <option value="Viša">Viša</option>
                <option value="Visoka">Visoka</option>

            </select>

        </div>

        </div><!-- form-group Ends -->

    <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label"> Slika: </label>

           <div class="col-md-6" > 
            <input type="file" name="c_image" class="form-control"  ><br>

            <img src="../customer/customer_images/<?php echo $customer_image; ?>" width="100" height="100" class="img-responsive" >

        </div>
    </div><!-- form-group Ends -->
    
    <div class="form-group" ><!-- form-group Starts -->

        <label class="col-md-3 control-label" > CV :</label>

       <div class="col-md-6" > 
        <input type="file" name="c_cv" class="form-control" > <br>
        <a href="<?php if (!empty($customer_cv)) {echo "../customer/customer_images/".$customer_cv;} ?>" ><?php echo $customer_cv; ?></a>
    </div>              

   
    </div><!-- form-group Ends -->
    
    <div class="form-group" ><!-- form-group Starts -->

        <label class="col-md-3 control-label" > Motivaciono pismo:</label>

       <div class="col-md-6" > 
        <input type="file" name="c_motiv" class="form-control" > <br>
           <a  href="<?php if (!empty($customer_motiv)) {echo "../customer/customer_images/".$customer_motiv;} ?>">
               <?php echo $customer_motiv; ?> </a>
        </div>
   
    </div><!-- form-group Ends -->
    
    
    <div class="form-group"><!-- form-group Starts -->

        <label class="col-md-3 control-label" > Omiljena izreka: </label>

        <div class="col-md-6" > 

            <textarea  class="form-control" rows="5" name="c_izreka"><?php echo $customer_desc; ?></textarea>

        </div>

    </div><!-- form-group Ends -->
    
     <div class="form-group"><!-- form-group Starts -->

        <label class="col-md-3 control-label" > Najznačajnija znanja i veštine: </label>

        <div class="col-md-6" > 

            <textarea  class="form-control" rows="5" name="c_vestina"><?php echo $customer_vestina; ?></textarea>

        </div>

    </div><!-- form-group Ends -->


    <div class="text-center" ><!-- text-center Starts -->

        <button name="update" class="btn btn-primary" >

            <i class="fa fa-user-md" ></i> Ažuriraj

        </button>


    </div><!-- text-center Ends -->


</form><!--- form Ends -->


</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 
<?php

if(isset($_POST['update'])){

    $update_id = $customer_id;

    $c_name = escape($_POST['c_name']);

    $c_email = filter_var($_POST['c_email'], FILTER_SANITIZE_EMAIL);

    $c_country = escape($_POST['c_country']);

    $c_city = escape($_POST['c_city']);

    $c_contact = escape($_POST['c_contact']);

    $c_address = escape($_POST['c_address']);

    $c_pol = $_POST['pol'];

    $c_datum = $_POST['datum'];

    $c_profil = $_POST['profil'];  

    $c_sprema = $_POST['sprema'];
    
    $c_izreka = escape($_POST['c_izreka']);
    
    $c_vestina = escape($_POST['c_vestina']);
    
    $c_sati = escape($_POST['c_sati']);
    
    $c_eval = escape($_POST['c_eval']);

    $c_image = $_FILES['c_image']['name'];

    $c_image_tmp = $_FILES['c_image']['tmp_name'];

        if(empty($c_image)){

            $c_image = $new_customer_image;
            
        }else{

             $file="../customer/customer_images" ."/". $new_customer_image;

              if (file_exists($file)) {
                    unlink($file);
                }
        }

    $c_cv = $_FILES['c_cv']['name'];

    $c_cv_tmp = $_FILES['c_cv']['tmp_name'];

        if(empty($c_cv)){

            $c_cv = $new_customer_cv;
            
        }else{

             $file="../customer/customer_images" ."/". $new_customer_cv;

              if (file_exists($file)) {
                    unlink($file);
                }
        }
    
     $c_motiv = $_FILES['c_motiv']['name'];

     $c_motiv_tmp = $_FILES['c_motiv']['tmp_name'];

        if(empty($c_motiv)){

            $c_motiv = $new_customer_motiv;
            
        }else{

             $file="../customer/customer_images" ."/". $new_customer_motiv;

              if (file_exists($file)) {
                    unlink($file);
                }
        }

    $update_customer = "update volunteers set customer_name='$c_name',customer_email='$c_email',customer_country='$c_country',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address',customer_image='$c_image',customer_cv='$c_cv',customer_motiv='$c_motiv',customer_pol='$c_pol',customer_datum='$c_datum',customer_profil='$c_profil',customer_sprema='$c_sprema',customer_desc='$c_izreka',customer_vestina='$c_vestina',customer_sati='$c_sati',customer_eval='$c_eval' where customer_id='$update_id'";

    $run_customer = mysqli_query($con,$update_customer);

    if($run_customer){
        
        move_uploaded_file($c_image_tmp,"../customercustomer_images/$c_image");
        move_uploaded_file($c_cv_tmp,"../customercustomer_images/$c_cv");
        move_uploaded_file($c_motiv_tmp,"../customercustomer_images/$c_motiv");

        echo "<script>alert('Nalog je ažuriran.')</script>";

        echo "<script>window.open('index.php?edit_volunteers=$edit_id','_self')</script>";

    }

}


?>
<script>
    $(document).ready(function () {   // Help for the HTML4 version.
    $('select[name=oblast]').change(function () {
        $('input[name=profil]').val($(this).val());
    });
});
</script>
<?php } ?>