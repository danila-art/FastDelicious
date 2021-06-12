<?php
if (!empty($_POST['goods-check'])) {
    $goodsCheck = $_POST['goods-check'];
} else {
    $goodsCheck = null;
}
if (!empty($_POST['id_rest'])) {
    $id_rest = $_POST['id_rest'];
} else {
    $id_rest = null;
}
if ($goodsCheck != null && $id_rest != null) {
    require_once 'connection.php';
    if (!empty($_COOKIE['loginUser'])) {
        $cookieLoginUser = $_COOKIE['loginUser'];
        $id_user = '';
        $loginUser = '';
        $resultUser = $connect->query("SELECT * FROM `user` WHERE `login` = '$cookieLoginUser '");
        while ($outLogin = mysqli_fetch_assoc($resultUser)) {
            $loginUser = $outLogin['login'];
            $id_user = $outLogin['id_user'];
        }
    }
    $result = $connect->query("SELECT * FROM `user_basket` WHERE `id_user` = '$id_user'");
    $count = mysqli_num_rows($result);
    if ($count != 0) {
        while ($row  = mysqli_fetch_assoc($result)) {
            $outUserBasket = $id_user;
            $outRestBusket = $row['id_restourant'];
        }
        if ($outRestBusket != $id_rest) {
            echo $outRestBusket;
            echo $id_rest;
            $connect->query("DELETE FROM `user_basket` WHERE `id_user` = '$id_user'");
            foreach ($goodsCheck as $value) {
                $connect->query("INSERT INTO `user_basket`(`id_user`, `id_restourant`, `id_restourant_goods`) VALUES ('$id_user','$id_rest','$value')");
            }
            header('Location: ../page/user_basket.php');
        } else {
            foreach ($goodsCheck as $value) {
                $checkGoods = $connect->query("SELECT * FROM `user_basket` WHERE `id_user` = '$id_user' and `id_restourant_goods` = '$value'");
                if (mysqli_num_rows($checkGoods) == 0) {
                    $connect->query("INSERT INTO `user_basket`(`id_user`, `id_restourant`, `id_restourant_goods`) VALUES ('$id_user','$id_rest','$value')");
                }
            }
            header('Location: ../page/user_basket.php');
        }
    } else {

        foreach ($goodsCheck as $value) {
            $connect->query("INSERT INTO `user_basket`(`id_user`, `id_restourant`, `id_restourant_goods`) VALUES ('$id_user','$id_rest','$value')");
        }
    }
}
