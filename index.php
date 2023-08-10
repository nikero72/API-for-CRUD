<?php 
    header('Content-type: json/application');
    require 'connect.php';
    require 'functions.php';

    $method = $_SERVER['REQUEST_METHOD'];

    switch ($method) {
        case "GET":
            require_once 'methods/get.php';
            break;
        case "POST":
            require_once 'methods/post.php';
            break;
        case "PATCH":
            require_once 'methods/patch.php';
            break;
        case "DELETE":
            require_once 'methods/delete.php';
            break;
        default:
            break;
    }        