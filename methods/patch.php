<?php 
    require 'exploding.php';

    if ($type === 'posts') {
        if (isset($id)) {
            $data = file_get_contents('php://input');
            $data = json_decode($data, associative: true);
            updateItem($connect, $id, $data);
        }
    }