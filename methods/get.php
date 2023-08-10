<?php 
    require 'exploding.php';

    if ($type === 'items') {
        if (isset($id)) {
            getItem($connect, $id);
        } else {
            getItems($connect);
        }
    }