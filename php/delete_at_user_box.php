<?php
if(!empty($_POST['id_rest'])){
    $id_rest = $_POST['id_rest'];
    require_once 'connection.php';
    $connect->query("DELETE FROM `user_box` WHERE `id_restourant` = '$id_rest'");
    header('Location: ../page/user_page.php');
}
?>