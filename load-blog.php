<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

switch ($_REQUEST['sAction']) {
    default:
        getBlogs();

        break;

    
    case 'getPaginatorBlog';

        getPaginatorBlog();

    break;
}
