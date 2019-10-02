<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>


<div class="row"><!-- row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

    <ol class="breadcrumb"><!-- breadcrumb Starts -->

        <li class="active">

            <i class="fa fa-dashboard"> </i> Dashboard / Unos bloga

        </li>

    </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

    <h3 class="panel-title">

        <i class="fa fa-money fa-fw"></i> Unos bloga

    </h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->


    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">    
     
     <div class="form-group" ><!-- form-group Starts -->

    <label class="col-md-3 control-label" >Naziv bloga </label>

        <div class="col-md-6" >

        <input type="text" name="title" class="form-control" required >

        </div>

    </div><!-- form-group Ends -->
     
     
    <div class="form-group" ><!-- form-group Starts -->

    <label class="col-md-3 control-label" >  Url bloga </label>

    <div class="col-md-6" >

    <input type="text" name="post_url" class="form-control" required >

    <br>

    <p style="font-size:15px; font-weight:bold;">

    Url primer : Novi-Sad-Grad

    </p>

    </div>

    </div><!-- form-group Ends -->
      

     <div class="form-group" ><!-- form-group Starts -->

        <label class="col-md-3 control-label" > Oblast </label>

        <div class="col-md-6" >


        <select name="post_category" class="form-control" >

        <option> izaberi oblast </option>

        <?php

        $get_cat = "select * from categories ";

        $run_cat = mysqli_query($con,$get_cat);

        while ($row_cat=mysqli_fetch_array($run_cat)) {

            $cat_id = $row_cat['cat_id'];

            $cat_title = $row_cat['cat_title'];

            echo "<option value='$cat_id'>$cat_title</option>";

        }

        ?>


        </select>

        </div>

        </div><!-- form-group Ends -->
      
 
       <div class="form-group">
        <label class="col-md-3 control-label" > Status </label>
        <div class="col-md-6" >
         <select name="post_status" id="">
             <option value="draft">Post Status</option>
             <option value="published">Published</option>
             <option value="draft">Draft</option>
         </select>
           </div>
      </div>
      
      
     <div class="form-group" ><!-- form-group Starts -->
        <label class="col-md-3 control-label" >Slika</label>
        <div class="col-md-6" >
            <input type="file" name="image" class="form-control" required >
        </div>
    </div><!-- form-group Ends -->
     
     <div class="form-group" ><!-- form-group Starts -->
        <label class="col-md-3 control-label" > Tag </label>
    <div class="col-md-6" >
        <input type="text" name="post_tags" class="form-control" >
    </div>
    </div><!-- form-group Ends -->
      
      <div class="form-group">
         <label class="col-md-2 control-label" for="post_content">Post Content</label>
         <div class="col-md-9 col-md-offset-2" >
         <textarea class="form-control" name="post_content" id="content" cols="30" rows="15">
         </textarea>
      </div>
        </div>
      


       <div class="form-group">
         <label class="col-md-3 control-label" ></label>
         <div class="col-md-6" >
          <input class="btn btn-primary" type="submit" name="create_post" value="Unesi blog">
      </div>
    </div>

</form>

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 





<?php
   

   if(isset($_POST['create_post'])) {
   
            $post_title        = escape($_POST['title']);
       
            $post_user         = $admin_name;
            $post_cat_id        = $_POST['post_category'];
            $post_status       = $_POST['post_status'];
            $post_url           = escape($_POST['post_url']);
    
            $post_image        = $_FILES['image']['name'];
            $post_image_temp   = $_FILES['image']['tmp_name'];
    
    
            $post_tags         = escape($_POST['post_tags']);
            $post_content      = $_POST['post_content'];
            $post_date         = date('d-m-y');

       
           
      $query = "INSERT INTO posts(post_cat_id, post_title, post_user, post_date,post_image,post_content,post_tags,post_status,post_url) ";
             
      $query .= "VALUES({$post_cat_id},'{$post_title}','{$post_user}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}','{$post_url}') "; 
             
      $create_post_query = mysqli_query($con, $query);  
          
      confirmQuery($create_post_query);

      $the_post_id = mysqli_insert_id($con);


             
       if($create_post_query){
         
           move_uploaded_file($post_image_temp, "blogs_images/$post_image" );  

            echo "<script>alert('Blog je unet')</script>";

            echo "<script>window.open('index.php?view_posts','_self')</script>";

        }

   }
    

 } ?>   