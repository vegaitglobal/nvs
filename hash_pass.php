<?php
session_start();

include("includes/db.php");
include("functions/functions.php");
$query = "select * from volunteers";
$volontiers = mysqli_query($con, $query);
while($volontier = $volontiers->fetch_assoc()) {
    $app = password_get_info($volontier['customer_pass']);
    if($app["algo"] === 0){
        $pass_hashed = password_hash($volontier['customer_pass'], PASSWORD_BCRYPT);
        $email = $volontier["customer_email"];
        $queryUpdate = "update volunteers set customer_pass='$pass_hashed' where customer_email='$email'";
        $result = mysqli_query($con, $queryUpdate);
        if (!$result) {
            print_r("Error ".$email);
        }
    }
}

