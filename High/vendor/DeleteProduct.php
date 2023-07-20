<?php
    session_start();
    $mysql = new mysqli('localhost', 'root', '', 'StudentEatery');

    $productID = $_POST['foodChoice'];

    $title = $mysql -> query("SELECT * FROM Food WHERE id = '$productID'");
    $title = mysqli_fetch_row($title);

    $filepath = '../Images/Menu/'.$title[1].'.jpg';
    unlink($filepath);
    $mysql->query("DELETE FROM Food WHERE id = '$productID'");
?>