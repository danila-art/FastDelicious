<?php
if (!empty($_COOKIE['loginUser'])) {
    $loginUser = $_COOKIE['loginUser'];
    if (!empty($_FILES['img_user']['name'])) {
        $userImg = addslashes(file_get_contents($_FILES['img_user']['tmp_name']));
    } else {
        $userImg = null;
    }
    require_once 'connection.php';
    $userIdResult = $connect->query("SELECT * FROM `user` WHERE `login` = '$loginUser'");
    $idUser = '';
    while ($userOut = mysqli_fetch_assoc($userIdResult)) {
        $idUser = $userOut['id_user'];
    }
    if ($userImg != null) {
        $connect->query("UPDATE `user_img` SET `user_img`= '$userImg' WHERE `id_user` = '$idUser'");
        header('Location: ../page/user_page.php');
    }
}
