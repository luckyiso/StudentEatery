<?php
    session_start();
    $mysql = new mysqli('localhost', 'root', '', 'StudentEatery');

    $productID = $_POST['productID'];
    $quantity = $_POST['quantity'];
    $userID = $_SESSION['id'];

    $select_cart = $mysql->query("SELECT * FROM Cart WHERE userID = '$userID'");
    $rowCart = mysqli_fetch_row($select_cart);
    $resultCart = explode(" ", $rowCart[2]);
    $quantityCart = explode(" ", $rowCart[3]);

    $sum = 0;

    for ($i = 0; $i < count($resultCart); $i++){
        if ($resultCart[$i] == $productID){
            $quantityCart[$i] = $quantity;
        }
        $select_food = $mysql->query("SELECT * FROM Food WHERE id = '$resultCart[$i]'");
        $rowFood = mysqli_fetch_row($select_food);
        $sum += $rowFood[4]*$quantityCart[$i];
    }

    $quantityCart = implode(" ", $quantityCart);
    $mysql -> query ("UPDATE Cart SET quantity = '$quantityCart' WHERE userID = $userID");
    $response = [
        "status" => true,
        "sum" => number_format($sum, 0, '.', ' ')
    ];

    echo json_encode($response);
?>