<?php
    session_start();
    $mysql = new mysqli('localhost', 'root', '', 'StudentEatery');
    if (isset($_FILES['productImg'])){
        move_uploaded_file($_FILES['productImg']['tmp_name'],
        dirname(dirname(__FILE__)).'/Images/Menu/'.$_FILES['productImg']['name']);
    }
    $productTitle = $_POST['productTitle'];
    $productDescription = $_POST['productDescription'];
    $productPrice = $_POST['productPrice'];
    $productCategory = $_POST['productCategory'];
    $mysql->query("INSERT INTO Food (title, description, img, price, category) VALUES ('$productTitle', '$productDescription', CONCAT('$productTitle', '.jpg'), '$productPrice', '$productCategory')");
?>