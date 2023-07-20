<?php
session_start();
$mysql = new mysqli('localhost', 'root', '', 'StudentEatery');
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
    <link rel="stylesheet" href="../css/Menu.css">
  
    <link rel="icon" type="image/png" href="/Images/Main/icons8-mountain-16.png">
    <title>Студенческая столовая</title>
</head>
<body>
    <div class="background">
        <header class="header">
            <div class="header_inner">
                <div class="header_logo">Столовая</div>
                    <nav class="nav">
                        <a class="nav_link" href="index.php">Меню</a>
                        <a class="nav_link" href="Pages/CabinetPage.php">Личный кабинет</a>
                        <a class="nav_link" href="Pages/Cart.php">Корзина</a>                        
                    </nav>   
                </div>
        </header>
        <div class="Menu">
            <div class="Category">Понедельник</div>
            <div class="Catalog">
                    <?php
                        $select = $mysql -> query("SELECT * FROM Food WHERE category = 'Понедельник'");
                        while ($row = mysqli_fetch_assoc($select)) { 
                     ?>  
                    <div class="Item" id="<?=$row['id']?>">               
                        <img src="Images/Menu/<?=$row['img']?>">
                        <div class="Info">
                            <div class="Name"><?=$row['title']?></div>
                            <div class="Description"><?=$row['description']?></div>
                            <div class="Price"><?=$row['price']?> ₽</div>
                        </div>
                        <?php
                            if ($_SESSION['id'] == 3){
                                echo '<button class = "hideButton" id = "'.$row['id'].'">Скрыть/показать товар</button>';
                            }
                        ?>
                        <button type="submit" class="AddToCart" name = "AddToCart<?=$row['id']?>" id="<?=$row['id']?>">В корзину</button>
                    </div>
                    <?php }; ?>
            </div>
            <div class="Category">Вторник</div>
            <div class="Catalog">
                    <?php
                        $select = $mysql -> query("SELECT * FROM Food WHERE category = 'Вторник'");
                        while ($row = mysqli_fetch_assoc($select)) { 
                     ?>  
                    <div class="Item" id="<?=$row['id']?>">               
                        <img src="Images/Menu/<?=$row['img']?>">
                        <div class="Info">
                            <div class="Name"><?=$row['title']?></div>
                            <div class="Description"><?=$row['description']?></div>
                            <div class="Price"><?=$row['price']?> ₽</div>
                        </div>
                        <?php
                        if ($_SESSION['id'] == 3){
                            echo '<button class = "hideButton" id = "'.$row['id'].'">Скрыть/показать товар</button>';
                        }
                        ?>
                        <button type="submit" class="AddToCart" name = "AddToCart<?=$row['id']?>" id="<?=$row['id']?>">В корзину</button>
                    </div>
                    <?php }; ?>
            </div>
            <div class="Category">Среда</div>
            <div class="Catalog">
                <?php
                $select = $mysql -> query("SELECT * FROM Food WHERE category = 'Среда'");
                while ($row = mysqli_fetch_assoc($select)) {
                    ?>
                    <div class="Item" id="<?=$row['id']?>">
                        <img src="Images/Menu/<?=$row['img']?>">
                        <div class="Info">
                            <div class="Name"><?=$row['title']?></div>
                            <div class="Description"><?=$row['description']?></div>
                            <div class="Price"><?=$row['price']?> ₽</div>
                        </div>
                        <?php
                        if ($_SESSION['id'] == 3){
                            echo '<button class = "hideButton" id = "'.$row['id'].'">Скрыть/показать товар</button>';
                        }
                        ?>
                        <button type="submit" class="AddToCart" name = "AddToCart<?=$row['id']?>" id="<?=$row['id']?>">В корзину</button>
                    </div>
                <?php }; ?>
            </div>
            <div class="Category">Четверг</div>
            <div class="Catalog">
                <?php
                $select = $mysql -> query("SELECT * FROM Food WHERE category = 'Четверг'");
                while ($row = mysqli_fetch_assoc($select)) {
                    ?>
                    <div class="Item" id="<?=$row['id']?>">
                        <img src="Images/Menu/<?=$row['img']?>">
                        <div class="Info">
                            <div class="Name"><?=$row['title']?></div>
                            <div class="Description"><?=$row['description']?></div>
                            <div class="Price"><?=$row['price']?> ₽</div>
                        </div>
                        <?php
                        if ($_SESSION['id'] == 3){
                            echo '<button class = "hideButton" id = "'.$row['id'].'">Скрыть/показать товар</button>';
                        }
                        ?>
                        <button type="submit" class="AddToCart" name = "AddToCart<?=$row['id']?>" id="<?=$row['id']?>">В корзину</button>
                    </div>
                <?php }; ?>
            </div>
            <div class="Category">Пятница</div>
            <div class="Catalog">
                <?php
                $select = $mysql -> query("SELECT * FROM Food WHERE category = 'Пятница'");
                while ($row = mysqli_fetch_assoc($select)) {
                    ?>
                    <div class="Item" id="<?=$row['id']?>">
                        <img src="Images/Menu/<?=$row['img']?>">
                        <div class="Info">
                            <div class="Name"><?=$row['title']?></div>
                            <div class="Description"><?=$row['description']?></div>
                            <div class="Price"><?=$row['price']?> ₽</div>
                        </div>
                        <?php
                        if ($_SESSION['id'] == 3){
                            echo '<button class = "hideButton" id = "'.$row['id'].'">Скрыть/показать товар</button>';
                        }
                        ?>
                        <button type="submit" class="AddToCart" name = "AddToCart<?=$row['id']?>" id="<?=$row['id']?>">В корзину</button>
                    </div>
                <?php }; ?>
            </div>
            <div class="Category">Суббота</div>
            <div class="Catalog">
                <?php
                $select = $mysql -> query("SELECT * FROM Food WHERE category = 'Суббота'");
                while ($row = mysqli_fetch_assoc($select)) {
                    ?>
                    <div class="Item" id="<?=$row['id']?>">
                        <img src="Images/Menu/<?=$row['img']?>">
                        <div class="Info">
                            <div class="Name"><?=$row['title']?></div>
                            <div class="Description"><?=$row['description']?></div>
                            <div class="Price"><?=$row['price']?> ₽</div>
                        </div>
                        <?php
                        if ($_SESSION['id'] == 3){
                            echo '<button class = "hideButton" id = "'.$row['id'].'">Скрыть/показать товар</button>';
                        }
                        ?>
                        <button type="submit" class="AddToCart" name = "AddToCart<?=$row['id']?>" id="<?=$row['id']?>">В корзину</button>
                    </div>
                <?php }; ?>
            </div>
        </div>
    </div>
    <script src="../Libraries/jquery-3.6.2.js"></script>
    <script src="js/main.js"></script>
</body>
</html>