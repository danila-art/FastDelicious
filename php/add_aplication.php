<?php
if (!empty($_POST['id_user'])) {
    $id_user = $_POST['id_user'];
} else {
    $id_user = null;
}
if (!empty($_POST['id_rest'])) {
    $id_rest = $_POST['id_rest'];
} else {
    $id_rest = null;
}
if (!empty($_POST['id_goods'])) {
    $id_goods = $_POST['id_goods'];
} else {
    $id_goods = null;
}
if (!empty($_POST['address'])) {
    $address = $_POST['address'];
} else {
    $address = null;
}
if (!empty($_POST['total-price'])) {
    $totalPrice = $_POST['total-price'];
} else {
    $totalPrice = null;
}
$dateToday = date("Y:m:d");
$timeNow = date("H:i");
if ($id_user != null && $id_rest != null && $id_goods != null && $address != null) {
    require_once 'connection.php';
    $connect->query("DELETE FROM `user_basket` WHERE `id_user` = '$id_user'");
    $id_aplication = '';
    $connect->query("INSERT INTO `aplication`(`id_user`, `id_restourant`, `user_address`, `date`, `time_start`, `price`, `status`) VALUES ('$id_user', '$id_rest', '$address','$dateToday','$timeNow','$totalPrice','Ожидает подтверждение')");
    $result = $connect->query("SELECT `aplication`.`id_aplication` FROM `aplication` WHERE `user_address` = '$address' AND `id_user` = '$id_user' AND `time_start` = '$timeNow'");
    while ($outId = mysqli_fetch_assoc($result)) {
        $id_aplication = $outId['id_aplication'];
    }
    if (!empty($id_aplication)) {
        foreach ($id_goods as $value) {
            $connect->query("INSERT INTO `aplication_goods`(`id_aplication`, `id_restourant_goods`) VALUES ('$id_aplication','$value')");
        }
    }
    header('Location: ../page/user_page.php');
}
