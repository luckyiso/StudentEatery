<?php
    session_start();
    $mysql = new mysqli('localhost', 'root', '', 'StudentEatery');
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $pass_confirm = $_POST['pass_confirm'];
    $Email = $_POST['email'];
    $phone = preg_replace('~\D+~','', $_POST['phone']);

    $check_login = $mysql -> query("SELECT * FROM users WHERE login='$login'");
    if (mysqli_num_rows($check_login)>0){
        $response = [
            "status" => false,
            "message" => 'Данный логин занят!'
        ];
        echo json_encode($response); 
        die();
    }

    $check_email = $mysql -> query("SELECT * FROM users WHERE email='$Email'");
    if (mysqli_num_rows($check_email) >0){
        $response = [
            "status" => false,
            "message" => 'Данный почта занята!'
        ];
        echo json_encode($response); 
        die();
    }
    $check_phone = $mysql -> query("SELECT * FROM users WHERE PhoneNumber='$phone'");
    if (mysqli_num_rows($check_phone) >0){
        $response = [
            "status" => false,
            "message" => 'Данный номер телефона занят!'
        ];
        echo json_encode($response); 
        die();
    }

    if($pass != $pass_confirm) {
        $response = [
            "status" => false,
            "message" => 'Пароли не совпадают!'
        ];
        echo json_encode($response); 
        die();
    }
    if(mb_strlen($pass) < 5) {
        $response = [
            "status" => false,
            "message" => 'Слишком короткий пароль! (мин. 5 символов)'
        ];
        echo json_encode($response); 
        die();
    }

    if ($pass === $pass_confirm) {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $mysql->query("INSERT INTO users (login, password, email, PhoneNumber) VALUES ('$login', '$pass', '$Email', '$phone')");
        $response = [
            "status" => true,
        ];
        echo json_encode($response); 
    }
?>