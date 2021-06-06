<?php
if (!empty($_POST['login'])) {
    $login = $_POST['login'];
} else {
    $login = null;
}
if (!empty($_POST['password'])) {
    $passwordRest = $_POST['password'];
    $passwordRest = md5($passwordRest);
} else {
    $passwordRest = null;
}
if ($login != null && $passwordRest != null) {
    require_once 'connection.php';
    $result = $connect->query("SELECT * FROM `restourants` WHERE `login` = '$login' AND `password` = '$passwordRest'");
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        setcookie('loginRest', $login,  time() + 3600, '/');
        header('Location: ../page/restaurants.php');
    } else {
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Fast Delicious</title>
    <link rel=\"stylesheet\" href=\"../css/main_style.css\">
    <link rel=\"shortcut icon\" href=\"../img/logo/logo_1-1.png\">
    <!-- font-media -->
    <link rel=\"stylesheet\" href=\"../css/font_media.css\">
</head>

<body>
<div class=\"message\">
<div class=\"message__box\">
<h2>Проверьте введеные данные</h2>
<h2><a href=\"../page/restaurants.php\">Вернуться назад</a></h2>
</div>
</div>
</body>
</html>";
    }
}
