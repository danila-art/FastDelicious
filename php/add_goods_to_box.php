<?php
if (!empty($_POST['id_goods'])) {
    $id_goods = $_POST['id_goods'];
} else {
    $id_goods = null;
}
if (!empty($_COOKIE['loginUser'])) {
    $loginUser = $_COOKIE['loginUser'];
} else {
    $loginUser = null;
}
if ($id_goods != null && $loginUser != null) {
    $thisUser = '';
    $id_restourant = '';
    $id_restourant_goods = '';
    require_once 'connection.php';
    $resultUser = $connect->query("SELECT * FROM `user` WHERE `login` = '$loginUser'");
    while ($user = mysqli_fetch_assoc($resultUser)) {
        $thisUser = $user['id_user'];
    }
    $resultRestAndGoods = $connect->query("SELECT `restourants`.`id_restourant`, `restourants_goods`.`id_restourant_goods` FROM `restourants` INNER JOIN `restourants_goods` ON `restourants`.`id_restourant` = `restourants_goods`.`id_restourant`  AND `restourants_goods`.`id_restourant_goods` = '$id_goods'");
    while ($dataResultRestAndGoods = mysqli_fetch_assoc($resultRestAndGoods)) {
        $id_restourant = $dataResultRestAndGoods['id_restourant'];
        $id_restourant_goods = $dataResultRestAndGoods['id_restourant_goods'];
    }
    if (!empty($thisUser) && !empty($id_restourant) && !empty($id_restourant_goods)) {
        $connect->query("INSERT INTO `user_box`(`id_user`, `id_restourant`, `id_restourant_goods`) VALUES ('$thisUser','$id_restourant','$id_restourant_goods')");
        echo "<form action=\"../page/goods_page.php\" method=\"post\" id=\"form\">
            <input type=\"hidden\" name=\"id_rest\" value=\"$id_restourant\">
        </form>
        <script>
            document.getElementById('form').submit();
        </script>";
    }
}
