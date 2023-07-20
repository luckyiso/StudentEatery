<?php
    session_start();
    $mysql = new mysqli('localhost', 'root', '', 'StudentEatery');
    $orders = $mysql -> query("SELECT * FROM OrderHistory");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Студенческая столовая</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="/css/CashierPage.css">
    <link rel="icon" type="image/png" href="/Images/Main/icons8-mountain-16.png">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>
<body>
    <table>
        <thead>
            <th>Дата</th>
            <th>Номер заказа</th>
            <th>Номер телефона</th>
            <th>Товар</th>
            <th>Количество</th>
            <th>Итог</th>
            <th>Статус</th>
        </thead>
        <tbody>
                <?php
                $select_cart = $mysql->query("SELECT * FROM Cart WHERE userID='$userID'");
                    while ($row = mysqli_fetch_assoc($orders)){
                        $userID = $row['userID'];
                        $number = $mysql -> query("SELECT PhoneNumber FROM users WHERE id ='$userID'");
                        $number = mysqli_fetch_row($number);

                        $food = explode(" ", $row['productID']);

                        echo "<tr>";
                        echo "<td>$row[date]</td>";
                        echo "<td>$row[id]</td>";
                        echo "<td>$number[0]</td>";

                        for ($i = 0; $i < count($food); $i++){
                            $foodRow = $mysql -> query("SELECT title FROM Food WHERE id ='$food[$i]'");
                            $foodRow = mysqli_fetch_row($foodRow);
                        }
                        echo "<td>$row[productID]</td>";
                        echo "<td>$row[quantity]</td>";
                        echo "<td>$row[price] ₽</td>";
                        echo    "<td>
                                    <select name = 'orderStatus' id = '$row[id]'>
                                        <option selected ='selected' value ='$row[status]'>$row[status]</option>
                                        <option value = 'Подтвержден'>Подтвержден</option>
                                        <option value = 'Готов к выдаче'>Готов к выдаче</option>
                                        <option value = 'Выдан'>Выдан</option>
                                        <option value = 'Ожидает подтверждения на кассе'>Ожидает подтверждения на кассе</option>
                                    </select>
                                </td>";
                        echo "</tr>";
                    }
                ?>
        </tbody>
    </table>
    <script src="/js/main.js"></script>
</body>
</html>