<?php 
    require 'exploding.php';

    if ($type === 'posts') {
        if (isset($id)) {
            deleteItem($connect, $id);
        }
    }