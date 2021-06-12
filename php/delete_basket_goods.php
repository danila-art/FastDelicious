<?php
if(!empty($_POST['id_goods'])){
    $id_goods = $_POST['id_goods'];
}else{
    $id_goods = null;
}
if($id_goods != null){
    require_once 'connection.php';
    $connect->query("DELETE FROM `user_basket` WHERE `id_restourant_goods` = '$id_goods'");
    header('Location: ../page/user_basket.php');
}
?>