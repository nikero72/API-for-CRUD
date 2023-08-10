<?php
    function getItems($connect) {
        $items = mysqli_query($connect, "SELECT * FROM `items`");
    
        $itemList = [];
        
        while ($item = mysqli_fetch_assoc($items)) {
            $itemList[] = $item;
        }
        
        echo json_encode($itemList);
    }

    function getItem($connect, $id) {
        $item = mysqli_query($connect, "SELECT * FROM `items` WHERE `id` = '$id'");
        
        if (mysqli_num_rows($item) === 0) {
            http_response_code(404);

            $response = [
                "status" => false,
                "message" => "Item no found"
            ];
            echo json_encode($response);  
        } else {
            $item = mysqli_fetch_assoc($item); 
            echo json_encode($item);
        }
    }