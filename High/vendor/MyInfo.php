    <?php
    session_start();
    $mysql = new mysqli('localhost', 'root', '', 'StudentEatery');
    $pass = $_POST['ChangePassword'];
    $Email = $_POST['ChangeEmail'];
    $adress = $_POST['Adress'];
    $phone = preg_replace('~\D+~','', $_POST['ChangePhone']);
    $id = $_SESSION['id'];

    $check_email = $mysql->query("SELECT * FROM StudentEatery WHERE email='$Email'");
if (mb_strlen($Email) != 0) {
    if (mysqli_num_rows($check_email) > 0) {
        $response = [
            "status" => false,
            "message" => 'Данный почта занята!'
        ];
        echo json_encode($response);
        die();
    } else {
        $mysql->query("UPDATE StudentEatery Set email='$Email' WHERE id='$id'");
        $response = [
            "status" => true,
            "message" => 'Данные изменены'
        ];
        echo json_encode($response);
    }
}

if (mb_strlen($phone) != 0) {
    $check_phone = $mysql->query("SELECT * FROM StudentEatery WHERE PhoneNumber='$phone'");
    if (mysqli_num_rows($check_phone) > 0) {
        $response = [
            "status" => false,
            "message" => 'Данный номер телефона занят!'
        ];
        echo json_encode($response);
        die();
    } else {
        $mysql->query("UPDATE StudentEatery Set PhoneNumber='$phone' WHERE id='$id'");
        $response = [
            "status" => true,
            "message" => 'Данные изменены'
        ];
        echo json_encode($response);
    }
}
if (mb_strlen($pass) != 0) {
    if (mb_strlen($pass) < 5) {
        $response = [
            "status" => false,
            "message" => 'Слишком короткий пароль! (мин. 5 символов)'
        ];
        echo json_encode($response);
        die();
    } else {
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $mysql->query("UPDATE StudentEatery Set password='$hash' WHERE id='$id'");
        $response = [
            "status" => true,
            "message" => 'Данные изменены'
        ];
        echo json_encode($response);
    }
}
?>