<?php
session_start();
$mysql = new mysqli('localhost', 'root', '', 'StudentEatery');
if ($_SESSION['id']==0){
    header('Location: SignUpPage.php');
}
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
    <link rel="stylesheet" href="../css/Cart.css">
  
    <link rel="icon" type="image/png" href="/Images/Main/icons8-mountain-16.png">
    <title>Студенческая столовая</title>
</head>
<body>
    <div class="background">
        <header class="header">
            <div class="header_inner">
                <div class="header_logo">Столовая</div>
                    <nav class="nav">
                        <a class="nav_link" href="../index.php">Меню</a>
                        <a class="nav_link" href="CabinetPage.php">Личный кабинет</a>
                        <a class="nav_link" href="Cart.php">Корзина</a>                        
                    </nav>   
                </div>
        </header>
        <div class="Cart">
            <div class="products">
                <table class="cart-table" cellspacing="0">
                    <thead>
                        <tr>
                            <td style="width: 20%"></td>
                            <td style="width: 32%">товар</td>
                            <td style="width: 20%">цена</td>
                            <td style="width: 20%">количество</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $userID = $_SESSION['id'];

                            $select_cart = $mysql->query("SELECT * FROM Cart WHERE userID='$userID'");
                            $rowCart = mysqli_fetch_row($select_cart);
                            $resultCart = explode(" ", $rowCart[2]);
                            $quantityCart = explode(" ", $rowCart[3]);
                            $sum = 0;

                            for ($i = 0;  $i < count($resultCart); $i++) {
                                if ($resultCart[0] == ""){
                                    break;
                                }
                                $productID = $resultCart[$i];
                                $select_food = $mysql->query("SELECT * FROM Food WHERE id='$productID'");
                                $rowFood = mysqli_fetch_row($select_food);
                                if ($rowFood[4] != "" || $quantityCart[$i] != ""){
                                    $sum += $rowFood[4]*$quantityCart[$i];
                                }
                        ?>
                        <tr id="<?=$productID?>">
                            <td style="text-align: center"> <img src="../Images/Menu/<?=$rowFood[1] . '.jpg'?>" height="100"> </td>
                            <td> <?=$rowFood[1]?> </td>
                            <td class="price" id="<?=$productID?>"> <?=number_format($rowFood[4], 0, '.', ' ')?> ₽ </td>
                            <td class="quantity"> <input type="number" min="1" name="quantity" id="<?=$productID?>" value="<?=$quantityCart[$i]?>"> </td>
                            <td style="text-align: center"> <button type="submit" class="Delete" id="<?=$productID?>" onclick="my_reload()">Удалить</button></td>
                        </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        <div class="separator" style="height: 5vh"></div>
        <div class="checkout">
            <div class="sum">Сумма:
                <div class="total"><?=number_format($sum, 0, '.', ' ')?></div>₽
            </div>
            <button class="Order" id="<?=$userID?>">Заказать</button>
        </div>
        </div>
    </div>
<script src="../Libraries/jquery-3.6.2.js"></script>
<script src="../js/main.js"></script>
</body>
</html>