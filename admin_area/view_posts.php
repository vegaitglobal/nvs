<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>


<div class="row"><!--  1 row Starts -->

    <div class="col-lg-12" ><!-- col-lg-12 Starts -->

        <ol class="breadcrumb" ><!-- breadcrumb Starts -->

            <li class="active" >

                <i class="fa fa-dashboard"></i> Dashboard / BLOG

            </li>

        </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!--  1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

    <h3 class="panel-title" ><!-- panel-title Starts -->

    <i class="fa fa-money fa-fw" ></i> Pregled blogova

    </h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

    <?php


    include("delete_modal.php");

    if (isset($_POST['checkBoxArray'])) {
        foreach ($_POST['checkBoxArray'] as $postValueId) {
            $bulk_options = $_POST['bulk_options'];
        
            switch ($bulk_options) {
                case 'published':
                    $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}  ";

                    $update_to_published_status = mysqli_query($con, $query);
                    confirmQuery($update_to_published_status);

                    break;


                case 'draft':
                    $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}  ";

                    $update_to_draft_status = mysqli_query($con, $query);

                    confirmQuery($update_to_draft_status);

                    break;


                case 'delete':
                    $query = "DELETE FROM posts WHERE post_id = {$postValueId}  ";

                    $update_to_delete_status = mysqli_query($con, $query);

                    confirmQuery($update_to_delete_status);


                    break;

                case 'clone':
                    $query = "SELECT * FROM posts WHERE post_id = '{$postValueId}' ";
                    $select_post_query = mysqli_query($con, $query);

                    while ($row = mysqli_fetch_array($select_post_query)) {
                        $post_title         = $row['post_title'];
                        $post_cat_id   = $row['post_cat_id'];
                        $post_date          = $row['post_date'];
                        $post_user        = $row['post_user'];
                        $post_status        = $row['post_status'];
                        $post_image         = $row['post_image'] ;
                        $post_tags          = $row['post_tags'];
                        $post_content       = $row['post_content'];
                    }

                    $query = "INSERT INTO posts(post_cat_id, post_title, post_user, post_date,post_image,post_content,post_tags,post_status) ";

                    $query .= "VALUES({$post_cat_id},'{$post_title}','{$post_user}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}') ";

                    $copy_query = mysqli_query($con, $query);

                    if (!$copy_query) {
                         die("QUERY FAILED" . mysqli_error($con));
                    }

                    break;
            }
        }
    }


    ?>


<form action="" method='post'>

<table class="table table-bordered table-hover">
              

        <div id="bulkOptionContainer" class="col-xs-4">

        <select class="form-control" name="bulk_options" id="">
        <option value="">Select Options</option>
        <option value="published">Publish</option>
        <option value="draft">Draft</option>
        <option value="delete">Delete</option>
         <option value="clone">Clone</option>
        </select>

        </div> 

            
<div class="col-xs-4">

<input type="submit" name="submit" class="btn btn-success" value="Apply">
<a class="btn btn-primary" href="index.php?insert_post">Add New</a>

 </div>
         
   

                <thead>
                    <tr>
                <th><input id="selectAllBoxes" type="checkbox"></th>
                        <th>Id</th>
                        <th>Users</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Tags</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Views</th>
                    </tr>
                </thead>
                
                      <tbody>
                      

    <?php
    
    $query = "SELECT * FROM posts ORDER BY post_date DESC ";
    $select_posts = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($select_posts)) {
        $post_id            = $row['post_id'];
        $post_user          = $row['post_user'];
        $post_title         = $row['post_title'];
        $post_cat_id   = $row['post_cat_id'];
        $post_status        = $row['post_status'];
        $post_image         = $row['post_image'];
        $post_tags          = $row['post_tags'];
        $post_date          = $row['post_date'];
        $post_views   = $row['post_views'];
        
        echo "<tr>";
        
        ?>
        
 <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
          
        
        <?php
     
        echo "<td>$post_id </td>";


        if (!empty($post_user)) {
            echo "<td>$post_user</td>";
        }

         echo "<td>$post_title</td>";
            
        
        $query = "SELECT * FROM categories WHERE cat_id = {$post_cat_id} ";
        $select_categories_id = mysqli_query($con, $query);

        while ($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

        
            echo "<td>$cat_title</td>";
        }
        

        
        echo "<td>$post_status</td>";
        echo "<td><img width='100' src='blogs_images/$post_image' alt='image'></td>";
        echo "<td>$post_tags</td>";



        echo "<td>$post_date </td>";
        
        echo "<td><a class='btn btn-info' href='index.php?edit_post&p_id={$post_id}'>Edit</a></td>";


        ?>


        <form method="post">

            <input type="hidden" name="post_id" value="<?php echo $post_id ?>">

         <?php

            echo '<td><input class="btn btn-danger" type="submit" name="delete" value="Delete"></td>';

            ?>


        </form>


        <?php

         // echo "<td><a rel='$post_id' href='javascript:void(0)' class='delete_link'>Delete</a></td>";


        // echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
        echo "<td><a href='index.php?posts.php?reset={$post_id}'>{$post_views}</a></td>";
        echo "</tr>";
    }

    ?>
  
            </tbody>
            </table>
            
        </form>
    
    <?php

    if (isset($_POST['delete'])) {
        $the_post_id = escape($_POST['post_id']);
    
        $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
        $delete_query = mysqli_query($con, $query);
        echo "<script>window.open('index.php?view_posts','_self')</script>";
    }


    if (isset($_GET['reset'])) {
        $the_post_id = escape($_GET['reset']);
    
        $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = $the_post_id  ";
        $reset_query = mysqli_query($con, $query);
        echo "<script>window.open('index.php?view_posts','_self')</script>";
    }

    ?> 


<script>
 
    $(document).ready(function(){


        $(".delete_link").on('click', function(){


            var id = $(this).attr("rel");

            var delete_url = "index.php?posts.php?delete="+ id +" ";

            $(".modal_delete_link").attr("href", delete_url);


            $("#myModal").modal('show');

        });

    });


    <?php if (isset($_SESSION['message'])) {
         unset($_SESSION['message']);
    }

    ?>

</script>


</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->




<?php } ?>           