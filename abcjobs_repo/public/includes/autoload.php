<?php
//spl_autoload_register(function ($class_name) {    
//    include $_SERVER['DOCUMENT_ROOT'] . "/abcjobs/" .$class_name . '.php';
//});

spl_autoload_register(function ($class_name) {
    include $_SERVER['DOCUMENT_ROOT'] . "/abcjobs/" .str_replace('\\', '/', $class_name) . '.php';
});


?>