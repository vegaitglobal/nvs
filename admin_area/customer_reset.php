<?php


if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    if (isset($_GET['customer_reset'])) {
        $reset_id = $_GET['customer_reset'];
    
        $customer= " select * from volunteers where customer_id='$reset_id' ";
    
        $run_customer = mysqli_query($con, $customer);
    
        $row_customer = mysqli_fetch_array($run_customer);

        $c_email = $row_customer['customer_email'];
    

        $reset_customer = "update volunteers set customer_pass='123' where customer_id='$reset_id'";

        $run_customer = mysqli_query($con, $reset_customer);
    
        if ($run_customer) {
            $subject = "Promena lozinke na NVS-u  ";

            $from = "office@nvs.rs";

            $message = "

                                    <h2> Lozinka za sajt <a href='http://nvs.rs'>NVS</a> je promenjena na: 123</h2>
                                    <h2> Cim se prijavite mozete je promeniti. </h2> 
                                    
                                    ";

            $headers = "From: $from \r\n";
            $headers .= "Reply-To: $from \r\n";
            $headers .= "Return-Path: $from \r\n";
            $headers .= "Content-type: text/html \r\n";

            mail($c_email, $subject, $message, $headers);
                                    
            echo "<script>alert('Password je resetovan na 123')</script>";
        }

        
        echo "<script>window.open('index.php?view_volunteers','_self')</script>";
    }
}
