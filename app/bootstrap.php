<?php

require_once 'config.php';

spl_autoload_register(function($class_name) {
    include '../src/' . $class_name . '.php';
});

