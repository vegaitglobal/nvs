<?php

require_once __DIR__.'/../app/config.php';

$dbParams = config('doctrine_db');

$con = mysqli_connect("localhost", $dbParams['user'], $dbParams['password'], $dbParams['dbname']);
