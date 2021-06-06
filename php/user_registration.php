<?php
if (!empty($_POST['FIO'])) {
    $FIO = $_POST['FIO'];
} else {
    $FIO = null;
}
if (!empty($_POST['login'])) {
    $login = $_POST['login'];
} else {
    $login = null;
}
if (!empty($_POST['email'])) {
    $email = $_POST['email'];
} else {
    $email = null;
}
if (!empty($_POST['password'])) {
    $password = $_POST['password'];
    $passwordUser = md5($password);
} else {
    $password = null;
}
if ($FIO != null && $login != null && $email != null && $password != null) {
    require_once 'connection.php';
    $result = $connect->query("SELECT * FROM `user` WHERE `login` = '$login'");
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        $id_user = '';
        $connect->query("INSERT INTO `user`(`fio`, `login`, `email`, `password`, `rank`) VALUES ('$FIO','$login','$email','$passwordUser','user')");
        $userResult = $connect->query("SELECT * FROM `user` WHERE `login` = '$login' and `password` = '$passwordUser'");
        while ($userOut = mysqli_fetch_assoc($userResult)) {
            $id_user = $userOut['id_user'];
        }
        $connect->query("INSERT INTO `user_img`(`id_user`, `user_img`) VALUES ('$id_user','')");
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
<h2>Вы успешно зарегестрировались</h2>
<h2><a href=\"../\">Вернуться на главную</a></h2>
</div>
</div>
</body>
</html>";
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
<h2>Пользователь с таким логином уже существует</h2>
<h2><a href=\"../\">Вернуться на главную</a></h2>
</div>
</div>
</body>
</html>";
    }
}
