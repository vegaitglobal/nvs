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

//admins pass
$query_admin = "select * from admins";
$admins = mysqli_query($con, $query_admin);
while($admin = $admins->fetch_assoc()) {
	$app = password_get_info($admin['admin_pass']);
	if($app["algo"] === 0){
		$pass_hashed = password_hash($admin['admin_pass'], PASSWORD_BCRYPT);
		$email = $admin["admin_email"];
		$queryUpdate = "update admins set admin_pass='$pass_hashed' where admin_email='$email'";
		$result = mysqli_query($con, $queryUpdate);
		if (!$result) {
			print_r("Error ".$email);
		}
	}
}

//organizations pass
$query_org = "select * from organizations";
$organizations = mysqli_query($con, $query_org);
while($org = $organizations ->fetch_assoc()) {
	$app = password_get_info($org['manufacturer_pass']);
	if($app["algo"] === 0){
		$pass_hashed = password_hash($org['manufacturer_pass'], PASSWORD_BCRYPT);
		$email = $org["manufacturer_email"];
		$queryUpdate = "update organizations set manufacturer_pass='$pass_hashed' where manufacturer_email='$email'";
		$result = mysqli_query($con, $queryUpdate);
		if (!$result) {
			print_r("Error ".$email);
		}
	}
}

