<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

switch($_REQUEST['sAction']){

    default :

    getOrgs();

    break;

    
    case'getPaginatorOrgs';

    getPaginatorOrgs();

    break;

}

?>