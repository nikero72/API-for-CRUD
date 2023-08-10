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

    function addItem($connect, $data) {
        $title = $data['title'];
        $description = $data['description'];
        $price = $data['price'];
        
        mysqli_query($connect, "INSERT INTO `items` (`id`, `title`, `description`, `price`) VALUES (NULL, '$title', '$description', '$price')");

        http_response_code(201);

        $response = [
            "status" => true,
            "post_id" => mysqli_insert_id($connect)
        ];
        echo json_encode($response);
    }

    function updateItem($connect, $id, $data) {
        $title = $data['title'];
        $description = $data['description'];
        $price = $data['price'];

        mysqli_query($connect, "UPDATE `items` SET `title` = '$title', `description` = '$description', `price` = '$price' WHERE `items`.`id` = '$id'");

        http_response_code(200);

        $response = [
            "status" => true,
            "message" => "Item is updated"
        ];
        echo json_encode($response);
    }

    function deleteItem($connect, $id) {
        mysqli_query($connect, "DELETE FROM `items` WHERE `items`.`id` = '$id'");

        http_response_code(200);

        $response = [
            "status" => true,
            "message" => "Item is deleted"
        ];
        echo json_encode($response);
    }