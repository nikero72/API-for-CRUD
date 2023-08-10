<?php 
    require 'exploding.php';

    if ($type === 'posts') {
        addItem($connect, $_POST);
    }