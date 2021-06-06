<?php
if (!empty($_POST['name'])) {
    $name = $_POST['name'];
} else {
    $name - null;
}
if (!empty($_POST['desckription'])) {
    $desckription = $_POST['desckription'];
} else {
    $desckription - null;
}
if (!empty($_POST['restaurant_category'])) {
    $restaurant_category = $_POST['restaurant_category'];
} else {
    $restaurant_category - null;
}
if (!empty($_FILES['file_img']['name'])) {
    $file_img = addslashes(file_get_contents($_FILES['file_img']['tmp_name']));
} else {
    $file_img = null;
}
if (!empty($_POST['login'])) {
    $loginRest = $_POST['login'];
} else {
    $loginRest - null;
}
if (!empty($_POST['password'])) {
    $passwordRest = $_POST['password'];
    $passwordRest = md5($passwordRest);
} else {
    $passwordRest - null;
}
if ($name != null && $desckription != null && $restaurant_category != null && $file_img != null && $loginRest != null && $passwordRest != null) {
    require_once 'connection.php';
    $id_rest = 0;
    $connect->query("INSERT INTO `restourants`(`name`, `description`, `category`, `login`, `password`) VALUES ('$name','$desckription','$restaurant_category','$loginRest','$passwordRest')");
    $resultRest = $connect->query("SELECT * FROM `restourants` WHERE `login` = '$loginRest' and `password` = '$passwordRest'");
    while ($rest = mysqli_fetch_assoc($resultRest)) {
        $id_rest = $rest['id_restourant'];
    }
    $connect->query("INSERT INTO `restourants_img`(`id_restourant`, `restaurant_img`) VALUES ('$id_rest', '$file_img')");
    $countRest = mysqli_num_rows($resultRest);
    if ($countRest == 1) {
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
<h2>Вы успешно зарегестрировали ресторан</h2>
<h2><a href=\"../page/restaurants.php\">Вернуться на страницу ресторанам</a></h2>
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
<h2>Произошла ошибка, попробуйте ещё раз</h2>
<h2><a href=\"../page/restaurants.php\">Вернуться на страницу ресторанам</a></h2>
</div>
</div>
</body>
</html>";
    }
}
