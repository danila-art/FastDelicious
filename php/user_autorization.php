<?php
if (!empty($_POST['login'])) {
    $login = $_POST['login'];
} else {
    $login = null;
}
if (!empty($_POST['password'])) {
    $password = $_POST['password'];
} else {
    $password = null;
}
if ($login != null && $password != null) {
    require_once 'connection.php';
    $result = $connect->query("SELECT * FROM `user` WHERE `login` = '$login'");
    $count = mysqli_num_rows($result);
    if ($count != 0) {
        while ($user = mysqli_fetch_assoc($result)) {
            setcookie('loginUser', $user['login'], time() + 3600, '/');
            header('location: ../');
        }
    } else {
    }
}
