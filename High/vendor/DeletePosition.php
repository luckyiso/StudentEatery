<?php
    session_start();
    $mysql = new mysqli('localhost', 'root', '', 'StudentEatery');

    $productID = $_POST['productID'];
    $userID = $_SESSION['id'];

    $select_cart = $mysql->query("SELECT * FROM Cart WHERE userID = '$userID'");
    $rowCart = mysqli_fetch_row($select_cart);
    $resultCart = explode(" ", $rowCart[2]);
    $quantityCart = explode(" ", $rowCart[3]);
    $sum = 0;

    $isBegin = false;
    $isEnd = false;

    for ($i = 0; $i < count($resultCart); $i++){
        if ($resultCart[1] == ""){
            $mysql->query("DELETE FROM Cart WHERE userID = '$userID'");
            break;
        }
        if ($resultCart[$i] == $productID){
            $quantityCart[$i] = '';
            $resultCart[$i] = '';

            $quantityCart = implode(" ", $quantityCart);
            $resultCart = implode(" ", $resultCart);

            $quantityCart = preg_replace('|[\s]+|s', ' ', $quantityCart);
            $resultCart = preg_replace('|[\s]+|s', ' ', $resultCart);

            $quantityCart = trim($quantityCart);
            $resultCart = trim($resultCart);

            $mysql -> query("UPDATE Cart SET productID = '$resultCart' WHERE userID = '$userID'");
            $mysql -> query("UPDATE Cart SET quantity = '$quantityCart' WHERE userID = '$userID'");

            $select_food = $mysql->query("SELECT * FROM Food WHERE id = '$resultCart[$i]'");
            $rowFood = mysqli_fetch_row($select_food);

            $sum += $rowFood[4]*$quantityCart[$i];
        }
    }
    $response = [
        "status" => true,
        "sum" => number_format($sum, 0, '.', ' ')
    ];

    echo json_encode($response);
?>