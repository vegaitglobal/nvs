<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    if (isset($_GET['p_id'])) {
        $the_post_id =  $_GET['p_id'];
    }


    $query = "SELECT * FROM posts WHERE post_id = $the_post_id  ";
    $select_posts_by_id = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
        $post_id            = $row['post_id'];
        $post_user          = $row['post_user'];
        $post_title         = $row['post_title'];
         $post_url            = $row['post_url'];
        $post_cat_id   =    $row['post_cat_id'];
        $post_status        = $row['post_status'];
        $post_image         = $row['post_image'];
        $post_content       = $row['post_content'];
        $post_tags          = $row['post_tags'];
        $post_date          = $row['post_date'];
    }


    if (isset($_POST['update_post'])) {
        $post_user           =  $admin_name;
        $post_title          = escape($_POST['post_title']);
        $post_url            =  escape($_POST['post_url']);
        $post_cat_id         =  $_POST['post_category'];
        $post_status         =  $_POST['post_status'];
        $post_image          =  $_FILES['image']['name'];
        $post_image_temp     =  $_FILES['image']['tmp_name'];
        $post_content        = $_POST['post_content'];
        $post_tags           =  escape($_POST['post_tags']);

        move_uploaded_file($post_image_temp, "blogs_images/$post_image");

        if (empty($post_image)) {
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
            $select_image = mysqli_query($con, $query);

            while ($row = mysqli_fetch_array($select_image)) {
                $post_image = $row['post_image'];
            }
        }


          $query = "UPDATE posts SET ";
          $query .="post_title  = '{$post_title}', ";
            $query .="post_url  = '{$post_url}', ";
          $query .="post_cat_id = '{$post_cat_id}', ";
          $query .="post_date   =  now(), ";
          $query .="post_user = '{$post_user}', ";
          $query .="post_status = '{$post_status}', ";
          $query .="post_tags   = '{$post_tags}', ";
          $query .="post_content= '{$post_content}', ";
          $query .="post_image  = '{$post_image}' ";
          $query .= "WHERE post_id = {$the_post_id} ";

        $update_post = mysqli_query($con, $query);

        confirmQuery($update_post);

        echo "<p class='bg-success'>Post Updated.  <a href='index.php?path=view_posts'>Edit More Posts</a></p>";
    }
    ?>



<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Promena bloga

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Ažuriranje bloga

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->



    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

     <div class="form-group" ><!-- form-group Starts -->

    <label class="col-md-3 control-label" >Naziv bloga </label>

        <div class="col-md-6" >
            <input value="<?php echo $post_title; ?>"  type="text" class="form-control" name="post_title">

        </div>

    </div><!-- form-group Ends -->


    <div class="form-group" ><!-- form-group Starts -->

    <label class="col-md-3 control-label" >  Url bloga </label>

    <div class="col-md-6" >
        <input value="<?php echo $post_url; ?>"  type="text" class="form-control" name="post_url">

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

                   <?php

                    $query = "SELECT * FROM categories ";
                    $select_categories = mysqli_query($con, $query);

                    confirmQuery($select_categories);

                    while ($row = mysqli_fetch_assoc($select_categories)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];

                        if ($cat_id == $post_cat_id) {
                            echo "<option selected value='{$cat_id}'>{$cat_title}</option>";
                        } else {
                            echo "<option value='{$cat_id}'>{$cat_title}</option>";
                        }
                    }
                    ?>

            </select>

        </div>

    </div><!-- form-group Ends -->



       <div class="form-group">
        <label class="col-md-3 control-label" > Status </label>
        <div class="col-md-6" >
         <select name="post_status" id="">

        <option value='<?php echo $post_status ?>'><?php echo $post_status; ?></option>

          <?php

            if ($post_status == 'published') {
                echo "<option value='draft'>Draft</option>";
            } else {
                echo "<option value='published'>Publish</option>";
            }

            ?>
         </select>
           </div>
      </div>


     <div class="form-group" ><!-- form-group Starts -->
        <label class="col-md-3 control-label" >Slika</label>
        <div class="col-md-6" >

           <div class="col-md-6">
             <input  type="file" accept="image/*" name="image" value="<?php echo $post_image ?>">
              </div>
            <div class="col-md-6">
            <img width="200" src="blogs_images/<?php echo $post_image; ?>" alt="">
            </div>
        </div>
    </div><!-- form-group Ends -->

     <div class="form-group" ><!-- form-group Starts -->
        <label class="col-md-3 control-label" > Tag </label>
        <div class="col-md-6" >
            <input value="<?php echo $post_tags; ?>"  type="text" class="form-control" name="post_tags">
        </div>
    </div><!-- form-group Ends -->


      <div class="form-group">
         <label class="col-md-2 control-label" for="post_content">Sadržaj bloga</label>
         <div class="col-md-9 col-md-offset-2" >
         <textarea class="form-control" name="post_content" id="content" cols="30" rows="15"> <?php echo $post_content; ?>
         </textarea>
      </div>
        </div>

       <div class="form-group">
         <label class="col-md-3 control-label" ></label>
         <div class="col-md-6" >
         <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
      </div>
    </div>

</form>


</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php } ?>