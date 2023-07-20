<?php
    session_start();
    $mysql = new mysqli('localhost', 'root', '', 'StudentEatery');
    $orderStatus = $_POST['orderStatus'];
    $orderID = $_POST['orderID'];

    $mysql -> query("UPDATE OrderHistory SET status = '$orderStatus' WHERE id = '$orderID'");
?>
