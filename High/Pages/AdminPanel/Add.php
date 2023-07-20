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
    <link rel="stylesheet" href="/css/Cabinet.css">
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
                        <a class="nav_link" href="../CabinetPage.php">Личный кабинет</a>
                    </nav>   
                </div>
            </div>
        </header>
        <nav class="Sidenav">
            <p><a class="Sidenav_link" href="Add.php">Добавить товар</a></p>
            <p><a class="Sidenav_link" href="Delete.php">Удалить товар</a></p>
            <p><a class="Sidenav_link" href="Edit.php">Изменить товар</a></p>
            <a class="Sidenav_link" href="/vendor/LogOut.php">Выйти</a>
        </nav>
        <div class="AddProductWindow">
            <div>Добавление товара</div>
                <form id="AddProductFields">
                        <input type="text" name="productTitle" required placeholder="Название товара">
                        <input type="text" name="productDescription" required placeholder="Описание товара">
                        <input type="text" name="productPrice" required placeholder="Цена товара">
                        <input type="file" name="productImg" accept="image/jpg">
                        <select name="productCategory">
                            <option value="Понедельник">Пондельник</option>
                            <option value="Вторник">Вторник</option>
                            <option value="Среда">Среда</option>
                            <option value="Четверг">Четверг</option>
                            <option value="Пятница">Пятница</option>
                            <option value="Суббота">Суббота</option>
                        </select>
                        <button type="submit" class="AddProduct">Подтвердить</button>
                </form>
            </div>
        </div>
    </div>
    <script src="/Libraries/jquery-3.6.2.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>