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
                        <a class="nav_link" href="CabinetPage.php">Личный кабинет</a>
                        <a class="nav_link" href="Cart.php">Корзина</a>
                    </nav>   
                </div>
            </div>
        </header>
        <nav class="Sidenav">
            <?php if ($_SESSION['id'] == 3){
                echo '<p><a class="Sidenav_link" href="../Pages/CashierPanel/UserOrdersPage.php">Заказы пользователей</a></p>';
            }
            else {
                echo '<p><a class="Sidenav_link" href="Cabinet/MyOrdersPage.php">Мои заказы</a></p>';
            }
            ?>
            <a class="Sidenav_link" href="../vendor/LogOut.php">Выйти</a>
        </nav>
    </div>
    <?php
        if ($_SESSION['id']){
        }
        if ($_SESSION['id'] == 1){
            header('Location: ../Pages/AdminPanel/AdminPage.php');
        }
        if ($_SESSION['id'] == 0) {
            header('Location: ../Pages/SignUpPage.php');
        }  
    ?>
    <script src="../Libraries/jquery-3.6.2.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>