<?php
    session_start();
    $mysql = new mysqli('localhost', 'root', '', 'StudentEatery');

    $productID = $_POST['productID'];
    $userID = $_SESSION['id'];
    $select = $mysql -> query("SELECT * FROM Cart WHERE userID = $userID");
    if (mysqli_num_rows($select) > 0) {
        $mysql -> query("UPDATE Cart SET productID = CONCAT_WS(' ', productID, $productID)");
        $mysql -> query("UPDATE Cart SET quantity = CONCAT_WS(' ', quantity, 1)");
    } else {
        $mysql -> query("INSERT INTO Cart (id, userID, productID, quantity) VALUES (NULL, $userID, $productID, 1)");
    }
?>