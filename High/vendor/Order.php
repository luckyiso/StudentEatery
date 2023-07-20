<?php
    session_start();
    $mysql = new mysqli('localhost', 'root', '', 'StudentEatery');

    $userID = $_SESSION['id'];
    $sum = $_POST['sum'];
    $date = date('y-m-d');
    $mysql -> query("UPDATE Cart SET price = '$sum', status = 'Ожидает подтверждения на кассе', date = '$date' WHERE userID = '$userID'");
    $mysql -> query("INSERT INTO OrderHistory (userID, productID, quantity, price, status, date) SELECT userID, productID, quantity, price, status, date FROM Cart WHERE userID = '$userID'");
    $mysql -> query("DELETE FROM Cart WHERE userID = '$userID'");
    $response = [
        "status" => true,
    ];
    echo json_encode($response);
?>