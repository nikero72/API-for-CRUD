<?php 
    header('Content-type: json/application');
    require 'connect.php';
    require 'functions.php';

    $q = $_GET['q'];

    if (str_contains($q, '/')) {
        $params = explode('/', $q);

        $type = $params[0];
        $id = $params[1];
    } else {
        $type = $q;
    }
    

    if ($type === 'items') {
        if (isset($id)) {
            getItem($connect, $id);
        } else {
            getItems($connect);
        }
    }

    
    