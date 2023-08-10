<?php 
    $q = $_GET['q'];

    if (str_contains($q, '/')) {
        $params = explode('/', $q);

        $type = $params[0];
        $id = $params[1];
    } else {
        $type = $q;
    }