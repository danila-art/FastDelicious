<?php
if (empty($_COOKIE['loginUser'])) {
    echo "<script>window.location.href=\"../\"</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Delicious - О нас</title>
    <link rel="stylesheet" href="../css/main_style.css">
    <link rel="shortcut icon" href="../img/logo/logo_1-1.png">
    <link rel="stylesheet" href="../css/registration_autorization_style.css">
    <!-- style this page -->
    <link rel="stylesheet" href="../css/user_page_style.css">
    <!-- font-media -->
    <link rel="stylesheet" href="../css/font_media.css">
</head>

<body>
    <section class="contacts" id="contactsBlock">
        <div class="contacts__box">
            <div class="contacts__close">
                <img src="../img/icons/cancel.png" alt="errorUpImage">
            </div>
            <div class="contacts__box-inner">
                <h2>Адрес:</h2>
                <h2>Николая Островского, 95</h2>
                <h2>Советский район, Астрахань ​414024</h2>
            </div>
            <div class="contacts__box-inner">
                <h2>Телефон:</h2>
                <h2>8(917)888-25-24</h2>
                <h2>8(937)136-88-86</h2>
            </div>
            <div class="contacts__box-inner">
                <h2>Электронная почта:</h2>
                <h2>fast_delicious.30@mail.ru</h2>
            </div>
        </div>
    </section>
    <header class="header">
        <div class="header__fixed-block">
            <div class="header__flex">
                <div class="header__logo">
                    <img src="../img/logo/logo_1-1.png" alt="errorUpImage">
                </div>
                <div class="header__nav">
                    <h2><a href="../">Главная</a></h2>
                    <h2><a href="restaurants.php">Ресторанам</a></h2>
                    <h2><a href="about.php">О нас</a></h2>
                    <h2 id="buttonContact">Контакты</h2>
                </div>
                <?php
                if (!empty($_COOKIE['loginUser'])) {
                    $cookieLoginUser = $_COOKIE['loginUser'];
                    $id_user = '';
                    $loginUser = '';
                    require_once '../php/connection.php';
                    $resultUser = $connect->query("SELECT * FROM `user` WHERE `login` = '$cookieLoginUser '");
                    while ($outLogin = mysqli_fetch_assoc($resultUser)) {
                        $loginUser = $outLogin['login'];
                        $id_user = $outLogin['id_user'];
                    }
                    echo "<div class=\"header__user\" id=\"clickUserPage\">
            <div class=\"header__user-img\">
                <img src=\"../img/icons/user.png\" alt=\"errorUpImage\">
            </div>
            <div class=\"header__user-name\">
                <h2>$loginUser</h2>
            </div>
            <div class=\"header__user-exit\">
                <h2><a href=\"../php/exit_user.php\">Выйти</a></h2>
            </div>
        </div>";
                } else {
                    echo "<div class=\"header__user\">
            <div class=\"header__user-img\" id=\"userBlock\">
                <img src=\"../img/icons/user.png\" alt=\"errorUpImage\">
            </div>
        </div>";
                }
                ?>
            </div>
        </div>
    </header>
    <section class="user-data">
        <div style="color:white" class="user-data__heading">
            <h2>Информация о пользователе</h2>
        </div>
        <?php
        require_once '../php/connection.php';
        $resultUser = $connect->query("SELECT `user`.`fio`, `user`.`login`, `user`.`email`, `user_img`.`user_img` FROM `user` INNER JOIN `user_img` ON `user`.`id_user` = `user_img`.`id_user` AND `user`.`id_user` = '$id_user';");
        while ($dataUser = mysqli_fetch_assoc($resultUser)) {
            if (!empty($dataUser['user_img'])) {
                $base64User = base64_encode($dataUser['user-img']);
                $imgUser = "<img src=\"data:image/jpeg;base64,$base64User\" alt=\"errorUpImage\">";
                $buttonImg = "<div class=\"button-img\"><h2><a href=\"../php\">Поменять фото</a></h2></div>";
            } else {
                $imgUser = "<img src=\"../img/icons/user.png\" alt=\"errorUpImage\">";
                $buttonImg = "<div class=\"button-img\"><h2><a href=\"../php\">Добавить фото</a></h2></div>";
            }
            echo "<div style=\"color:white\" class=\"user-data__img-container\">
            $imgUser
            $buttonImg 
            </div>
            <div class=\"user-data__data\">
                <div class=\"user-data__heading\">
                    <h2>Личные данные</h2>
                </div>
                <div class=\"user-data__data-box\">
                    <h2>ФИО:</h2>
                    <h2>{$dataUser['fio']}</h2>
                </div>
                <div class=\"user-data__data-box\">
                    <h2>Логин:</h2>
                    <h2>{$dataUser['login']}</h2>
                </div>
                <div class=\"user-data__data-box\">
                    <h2>Email</h2>
                    <h2>{$dataUser['email']}</h2>
                </div>
            </div>
            ";
        }
        ?>
    </section>
    <section class="user-box">
        <div class="user-box__heading">
            <h2>Корзина</h2>
        </div>

    </section>
    <footer class="footer">
        <div class="footer__logo">
            <img src="../img/logo/logo_1-2.png" alt="errorUpImage">
        </div>
        <div class="footer__heading">
            <h1>О компании</h1>
        </div>
        <div class="footer__flex">
            <h2>О нас</h2>
            <h2>Условия полиики и конфедициальности</h2>
            <h2>Контакты</h2>
        </div>
    </footer>
    <script>
        const contactsBlock = document.getElementById('contactsBlock');
        const buttonContact = document.getElementById('buttonContact');
        const closeContactBlock = contactsBlock.querySelector('.contacts__close');
        buttonContact.addEventListener('click', () => {
            if (getComputedStyle(contactsBlock).display == 'none') {
                contactsBlock.style.display = 'block';
                closeContactBlock.addEventListener('click', () => {
                    if (getComputedStyle(contactsBlock).display == 'block') {
                        contactsBlock.style.display = 'none';
                    }
                });
            }
        });
    </script>
</body>

</html>