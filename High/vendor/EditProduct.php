<?php
    session_start();
    $mysql = new mysqli('localhost', 'root', '', 'StudentEatery');

    $productID = $_POST['foodChoice'];
    $productDescription = $_POST['productDescription'];
    $productPrice = $_POST['productPrice'];
    $productCategory = $_POST['productCategory'];

    $title = $mysql -> query("SELECT * FROM Food WHERE id = '$productID'");
    $title = mysqli_fetch_row($title);

    if (isset($_FILES['productImg'])){
        move_uploaded_file($_FILES['productImg']['tmp_name'],
        dirname(dirname(__FILE__)).'/Images/Menu/'.$_FILES['productImg']['name']);
        $mysql -> query ("UPDATE Food SET img = CONCAT('$title[1]', '.jpg') WHERE id ='$productID'");
    }


    if ($productDescription != '' && $productPrice == ''){
        $mysql->query("UPDATE Food SET description = '$productDescription' WHERE id = '$productID'");
    }
    if ($productDescription == '' && $productPrice != ''){
        $mysql->query("UPDATE Food SET price = '$productPrice' WHERE id = '$productID'");
    }
    if ($productDescription != '' && $productPrice != '') {
        $mysql->query("UPDATE Food SET description = '$productDescription', price = '$productPrice', category = '$productCategory' WHERE id = '$productID'");
    }
    if ($productDescription == '' && $productPrice == '' || $productDescription != '' && $productPrice == '' || $productDescription != '' && $productPrice != '' || $productDescription == '' && $productPrice != '') {
        $mysql->query("UPDATE Food SET category = '$productCategory' WHERE id = '$productID'");
    }
    if ($productDescription != '' && $productPrice != ''){
        $mysql->query("UPDATE Food SET price = '$productPrice' WHERE id = '$productID'");
    }
?>