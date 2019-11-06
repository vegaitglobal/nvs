<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

    <?php

    if (isset($_GET['id'])) {
        $delete_id = $_GET['id'];

        $select_cat = "select * from docs where docs_id='$delete_id'";

        $run_select1 = mysqli_query($con, $select_cat);

        while ($row = mysqli_fetch_array($run_select1)) {
                    $image1= $row["docs_doc"];
        }

        $delete_pro = "delete from docs where docs_id='$delete_id'";

        $run_delete = mysqli_query($con, $delete_pro);

        if ($run_delete) {
                    $file="../docs" ."/". $image1;

            if (file_exists($file)) {
                 unlink($file);
            } else {
            }


            echo "<script>alert('Dokument je izbrisan')</script>";

            echo "<script>window.open('index.php?path=view_docs','_self')</script>";
        }
    }

    ?>

<?php }
