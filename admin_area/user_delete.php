<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

    <?php

    if (isset($_GET['id'])) {
        $delete_id = $_GET['id'];

        $delete_user = "delete from admins where admin_id='$delete_id'";

        $run_delete = mysqli_query($con, $delete_user);

        if ($run_delete) {
            echo "<script>alert('One User Has Been Deleted')</script>";

            echo "<script>window.open('index.php?path=view_users','_self')</script>";
        }
    }


    ?>

<?php }
