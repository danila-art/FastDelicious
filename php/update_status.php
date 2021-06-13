<?php
if (!empty($_POST['id_aplication'])) {
    $id_aplication = $_POST['id_aplication'];
} else {
    $id_aplication = null;
}
if (!empty($_POST['status'])) {
    $status = $_POST['status'];
} else {
    $status = null;
}
if ($id_aplication != null && $status != null) {
    require_once 'connection.php';
    $connect->query("UPDATE `aplication` SET `status`='$status' WHERE `id_aplication` = '$id_aplication'");
    header('Location: ../page/restaurants.php');
}
