<?php


function classAutoLoader($class)
{

    $class    = strtolower($class);
    $the_path = "includes/{$class}.php";

    if (is_file($the_path) && !class_exists($class)) {
        include $the_path;
    }
    file_exists($the_path) ? require_once($the_path) : die("This file name {$class}.php not found");
}

spl_autoload_register('classAutoLoader');

function redirect($location)
{
    header("Location: {$location}");
}


?>