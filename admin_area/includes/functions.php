<?php


function redirect($location){


    header("Location:" . $location);
    exit;

}


function ifItIsMethod($method=null){

    if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){

        return true;

    }

    return false;

}

function isLoggedIn(){

    if(isset($_SESSION['user_role'])){

        return true;


    }


   return false;

}

function checkIfUserIsLoggedInAndRedirect($redirectLocation=null){

    if(isLoggedIn()){

        redirect($redirectLocation);

    }

}


function escape($string) {

global $con;

    
$str = mysqli_real_escape_string($con, trim($string));
//$str1 = htmlentities($str, ENT_QUOTES);    
$string = str_replace(array('\r', '\n',"'",'"'), array(chr(13), chr(10),Chr(32),Chr(32)), $str);    
 
    return $string;
 
}



function set_message($msg){

    if(!$msg) {

        $_SESSION['message']= $msg;

    } else {

        $msg = "";


        }

}


function display_message() {

    if(isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }


}







function confirmQuery($result) {
    
    global $con;

    if(!$result ) {
          
          die("QUERY FAILED ." . mysqli_error($con));
   
          
      }
    

}



function insert_categories(){
    
    global $con;

        if(isset($_POST['submit'])){

            $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)) {
        
             echo "This Field should not be empty";
    
    } else {



    $stmt = mysqli_prepare($con, "INSERT INTO categories(cat_title) VALUES(?) ");

    mysqli_stmt_bind_param($stmt, 's', $cat_title);

    mysqli_stmt_execute($stmt);


        if(!$stmt) {
        die('QUERY FAILED'. mysqli_error($con));
        
                  }


        
             }

             
    mysqli_stmt_close($stmt);
   
        
       }

}


function findAllCategories() {
global $con;

    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($con,$query);  

    while($row = mysqli_fetch_assoc($select_categories)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo "<tr>";
        
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
   echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
   echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
    echo "</tr>";

    }


}


function deleteCategories(){
global $con;

    if(isset($_GET['delete'])){
    $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
    $delete_query = mysqli_query($con,$query);
    header("Location: categories.php");


    }
            


}


function UnApprove() {
global $con;
if(isset($_GET['unapprove'])){
    
    $the_comment_id = $_GET['unapprove'];
    
    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id ";
    $unapprove_comment_query = mysqli_query($con, $query);
    header("Location: comments.php");
    
    
    }
    

}


function is_admin($username) {

    global $con; 

    $query = "SELECT user_role FROM users WHERE username = '$username'";
    $result = mysqli_query($con, $query);
    confirmQuery($result);

    $row = mysqli_fetch_array($result);


    if($row['user_role'] == 'admin'){

        return true;

    }else {


        return false;
    }

}



function username_exists($username){

    global $con;

    $query = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($con, $query);
    confirmQuery($result);

    if(mysqli_num_rows($result) > 0) {

        return true;

    } else {

        return false;

    }





}



function email_exists($email){

    global $con;


    $query = "SELECT user_email FROM users WHERE user_email = '$email'";
    $result = mysqli_query($con, $query);
    confirmQuery($result);

    if(mysqli_num_rows($result) > 0) {

        return true;

    } else {

        return false;

    }



}


function register_user($username, $email, $password){

    global $con;

        $username = mysqli_real_escape_string($con, $username);
        $email    = mysqli_real_escape_string($con, $email);
        $password = mysqli_real_escape_string($con, $password);

        $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));
            
            
        $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
        $query .= "VALUES('{$username}','{$email}', '{$password}', 'subscriber' )";
        $register_user_query = mysqli_query($con, $query);

        confirmQuery($register_user_query);

        



}

 function login_user($username, $password)
 {

     global $con;

     $username = trim($username);
     $password = trim($password);

     $username = mysqli_real_escape_string($con, $username);
     $password = mysqli_real_escape_string($con, $password);


     $query = "SELECT * FROM users WHERE username = '{$username}' ";
     $select_user_query = mysqli_query($con, $query);
     if (!$select_user_query) {

         die("QUERY FAILED" . mysqli_error($con));

     }


     while ($row = mysqli_fetch_array($select_user_query)) {

         $db_user_id = $row['user_id'];
         $db_username = $row['username'];
         $db_user_password = $row['user_password'];
         $db_user_firstname = $row['user_firstname'];
         $db_user_lastname = $row['user_lastname'];
         $db_user_role = $row['user_role'];


         if (password_verify($password,$db_user_password)) {

             $_SESSION['username'] = $db_username;
             $_SESSION['firstname'] = $db_user_firstname;
             $_SESSION['lastname'] = $db_user_lastname;
             $_SESSION['user_role'] = $db_user_role;



             redirect("/cms/admin");


         } else {


             return false;



         }



     }

     return true;

 }







