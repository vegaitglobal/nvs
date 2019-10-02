
<?php

if(isset($_GET['delete_wishlist'])){

    $delete_id = $_GET['delete_wishlist'];

    $delete_wishlist = "delete from wishlist where wishlist_id='$delete_id'";

    $run_delete = mysqli_query($con,$delete_wishlist);

    if($run_delete){

        echo "<script>alert('Vaša želja je izbrisana')</script>";

        echo "<script>window.open('index.php?my_wishlist','_self')</script>";

    }

}
?>