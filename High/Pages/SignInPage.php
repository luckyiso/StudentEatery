<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/SignIn.css">
    <link rel="icon" type="image/png" href="/Images/Main/icons8-mountain-16.png">
    <title>Студенческая столовая</title>
</head>
<body>
    <div class="background">
        <header class="header">
            <div class="header_inner">
                <div class="header_logo">Столовая</div>
                    <nav class="nav">
                        <a class="nav_link" href="/index.php">Меню</a>
                        <a class="nav_link" href="CabinetPage.php">Личный кабинет</a>
                    </nav>   
                </div>
        </header>
        <div class="AuthorizationWindow">
            <div id="Registration">Авторизация</div>
                <form>
                        <p><input type="text" name="login" required placeholder="Логин" maxlength="20"></p>
                        <input type="password" name="pass" required placeholder="Пароль" maxlength="32">
                        <button type="submit" class="log_button">Войти</button>
                        <p class="message"></p>
                </form>
            </div>
        </div>
    </div>
    <script src="../Libraries/jquery-3.6.2.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>