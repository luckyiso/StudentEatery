<?php
    session_start();
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $mysql = new mysqli('localhost', 'root', '', 'StudentEatery');
    $password = $mysql->query("SELECT password FROM users WHERE login='$login'");
    $hashArray = mysqli_fetch_row($password);
    $hash = $hashArray[0];

    if (password_verify($pass, $hash)){
        $user = $mysql -> query ("SELECT id FROM users WHERE login='$login'");
        $userId = mysqli_fetch_row($user);
        $_SESSION['id'] = $userId[0];
        $response = [
            "status" => true
        ];

        echo json_encode($response);
    }
    else {
    $response = [
        "status" => false,
        "message" => 'Неверный логин или пароль'
    ];
    echo json_encode($response);
    }

?>