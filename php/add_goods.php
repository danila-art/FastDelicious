<?php
if (!empty($_POST['id_rest'])) {
    $id_rest = $_POST['id_rest'];
} else {
    $id_rest = null;
}
if (!empty($_POST['name'])) {
    $name = $_POST['name'];
} else {
    $name = null;
}
if (!empty($_POST['desckription'])) {
    $desckription = $_POST['desckription'];
} else {
    $desckription = null;
}
if (!empty($_POST['goods_category'])) {
    $goods_category = $_POST['goods_category'];
} else {
    $goods_category = null;
}
if (!empty($_FILES['file_img']['name'])) {
    $fileImg = $_FILES['file_img']['name'];
    $fileImgGoods = addslashes(file_get_contents($_FILES['file_img']['tmp_name']));
} else {
    $fileImg = null;
}
if (!empty($_POST['goods_price'])) {
    $goods_price = $_POST['goods_price'];
} else {
    $goods_price = null;
}
if ($id_rest != null && $name != null && $desckription != null && $goods_category != null && $fileImg != null && $goods_price != null) {
    require_once 'connection.php';
    $resultGoodsIf = $connect->query("SELECT * FROM `restourants_goods` WHERE `goods_name` = '$name'");
    $countIf = mysqli_num_rows($resultGoodsIf);
    if ($countIf == 0) {
        $connect->query("INSERT INTO `restourants_goods`(`id_restourant`, `goods_name`, `goods_description`, `goods_category`, `price`) VALUES ('$id_rest','$name','$desckription','$goods_category','$goods_price')");
        $outThisGoods = $connect->query("SELECT * FROM `restourants_goods` WHERE `goods_name` = '$name'");
        while ($thisIdGoods = mysqli_fetch_assoc($outThisGoods)) {
            $id_goods = $thisIdGoods['id_restourant_goods'];
            $connect->query("INSERT INTO `restourants_goods_img`(`id_restourant_goods`, `goods_img`) VALUES ('$id_goods','$fileImgGoods')");
        }
        header('location: ../page/restaurants.php');
    }
}
