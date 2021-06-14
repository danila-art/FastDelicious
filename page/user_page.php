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
    <title>Fast Delicious - Страница пользователя</title>
    <link rel="stylesheet" href="../css/main_style.css">
    <link rel="shortcut icon" href="../img/logo/logo_1-1.png">
    <link rel="stylesheet" href="../css/registration_autorization_style.css">
    <!-- style this page -->
    <link rel="stylesheet" href="../css/user_page_style.css">
    <!-- font-media -->
    <link rel="stylesheet" href="../css/font_media.css">
</head>

<body>
    <section class="add-user-img" id="containerAddUserImg">
        <div class="add-user-img__box">
            <div class="contacts__close">
                <img src="../img/icons/cancel.png" alt="errorUpImage">
            </div>
            <div class="add-user-img__heading">
                <h2>Добавить фотографию</h2>
            </div>
            <form action="../php/user_add_img.php" method="post" enctype="multipart/form-data" id="formAddUserImg">
                <div class="add-user-img__input">
                    <input type="file" name="img_user" id="userImg">
                    <h4 style="color: red"></h4>
                </div>
                <div class="add-user-img__input-submit">
                    <input type="submit" value="Отправить">
                </div>
            </form>
        </div>
    </section>
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
                    <h2><a href="#myAplication">Мои заказы</a></h2>
                    <h2><a href="about.php">О нас</a></h2>
                    <h2 id="buttonContact">Контакты</h2>
                </div>
                <div class="header__basket">
                    <img src="../img/icons/2849824-basket-buy-market-multimedia-shop-shopping-store_107977.png" alt="errorUpImage">
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
                    $imgUseHeaderResult = $connect->query("SELECT `user_img`.`user_img` FROM `user` INNER JOIN `user_img` ON `user`.`id_user` = `user_img`.`id_user` AND `user`.`id_user` = '$id_user'");
                    $headerUserImgTeg = '';
                    while ($headerUserImg = mysqli_fetch_assoc($imgUseHeaderResult)) {
                        if (!empty($headerUserImg['user_img'])) {
                            $headerUserImgbase64 = base64_encode($headerUserImg['user_img']);
                            $headerUserImgTeg = "<div class=\"header__user-img user-active\"  id=\"clickUserPage\">
                                <img src=\"data:image/jpeg;base64,$headerUserImgbase64\" alt=\"errorUpImage\">
                            </div>";
                        } else {
                            $headerUserImgTeg = "<div class=\"header__user-img\" id=\"clickUserPage\">
                            <img src=\"../img/icons/user.png\" alt=\"errorUpImage\">
                            </div>";
                        }
                    }
                    echo "<div class=\"header__user\">
                                $headerUserImgTeg
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
        $resultUser = $connect->query("SELECT `user`.`fio`, `user`.`login`, `user`.`email`, `user_img`.`user_img` FROM `user` INNER JOIN `user_img` ON `user`.`id_user` = `user_img`.`id_user` AND `user`.`id_user` = '$id_user'");
        while ($dataUser = mysqli_fetch_assoc($resultUser)) {
            if (!empty($dataUser['user_img'])) {
                $addClass = "data-container-img-active";
                $base64User = base64_encode($dataUser['user_img']);
                $imgUser = "<img src=\"data:image/jpeg;base64,$base64User\" alt=\"errorUpImage\">";
                $buttonImg = "<div class=\"button-img\" id=\"buttonAddImg\"><h2>Поменять фото</h2></div>";
            } else {
                $imgUser = "<img src=\"../img/icons/user.png\" alt=\"errorUpImage\">";
                $buttonImg = "<div class=\"button-img\" id=\"buttonAddImg\"><h2>Добавить фото</h2></div>";
            }
            echo "<div style=\"color:white\" class=\"user-data__img-container {$addClass}\">
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
            <h2>Избранное</h2>
        </div>
        <?php
        require_once '../php/connection.php';
        $resultUserBox = $connect->query("SELECT * FROM `user_box` WHERE `id_user` = '$id_user'");
        if (mysqli_num_rows($resultUserBox) == 0) {
            echo "<div class=\"no-goods\">
                        <h2>У вас нет избранных файлов</h2>                
                    </div>";
        } else {
            echo "<div class=\"box__flex-container\">";
            // Запрос на каждый ресторан
            // SELECT DISTINCT(`user_box`.`id_restourant`) FROM `user_box` INNER JOIN `restourants` ON `restourants`.`id_restourant` = `user_box`.`id_restourant`

            // Запрос товары в каждом ресторане
            // SELECT `restourants`.`name`, `restourants_img`.`restaurant_img`, `restourants_goods`.`goods_name`,`restourants_goods`.`price`, `restourants_goods_img`.`goods_img` FROM `user_box` INNER JOIN `restourants` ON  `restourants`.`id_restourant` = `user_box`.`id_restourant`  INNER JOIN `restourants_img` ON `restourants`.`id_restourant` = `restourants_img`.`id_restourant` INNER JOIN `restourants_goods` ON `user_box`.`id_restourant_goods` = `restourants_goods`.`id_restourant_goods` INNER JOIN `restourants_goods_img` ON `restourants_goods`.`id_restourant_goods` = `restourants_goods_img`.`id_restourant_goods` AND `user_box`.`id_user` = '8'
            $resultRestaurant = $connect->query("SELECT DISTINCT(`user_box`.`id_restourant`), `restourants_img`.`restaurant_img`, `restourants`.`name` FROM `user_box` INNER JOIN `restourants` ON `restourants`.`id_restourant` = `user_box`.`id_restourant` INNER JOIN `restourants_img` ON `restourants_img`.`id_restourant` = `user_box`.`id_restourant`");
            while ($outRest = mysqli_fetch_assoc($resultRestaurant)) {
                $id_restourant  = $outRest['id_restourant'];
                $base64ImgRest = base64_encode($outRest['restaurant_img']);
                echo "<div class=\"rest-box\">
                        <div class=\"rest-box-container\">
                            <div class=\"delete-rest-box\">
                                <form action=\"../php/delete_at_user_box.php\" method=\"post\" class=\"form-delete-rest-box\">
                                    <input type=\"hidden\" name=\"id_rest\" value=\"$id_restourant\">
                                    <img class=\"img-delete-icon\" src=\"../img/icons/cancel-white.png\" alt=\"errorUpImage\">
                                </form>
                            </div>
                            <div class=\"rest-box__heading\">
                                <h1>{$outRest['name']}</h1>
                            </div>
                            <div class=\"rest-box__img\">
                                <img src=\"data:image/jpeg;base64,$base64ImgRest\" alt=\"errorUpImage\">
                            </div>
                    ";
                $resultGoods = $connect->query("SELECT `restourants`.`name`, `restourants_img`.`restaurant_img`, `restourants_goods`.`id_restourant_goods`, `restourants_goods`.`goods_name`,`restourants_goods`.`price`, `restourants_goods_img`.`goods_img` FROM `user_box` INNER JOIN `restourants` ON `restourants`.`id_restourant` = `user_box`.`id_restourant` INNER JOIN `restourants_img` ON `restourants`.`id_restourant` = `restourants_img`.`id_restourant` INNER JOIN `restourants_goods` ON `user_box`.`id_restourant_goods` = `restourants_goods`.`id_restourant_goods` INNER JOIN `restourants_goods_img` ON `restourants_goods`.`id_restourant_goods` = `restourants_goods_img`.`id_restourant_goods` AND `user_box`.`id_user` = '$id_user' AND `restourants`.`id_restourant` = '$id_restourant'");
                echo "<form action=\"../php/add_busket.php\" method=\"post\" class=\"form-booking\">
                <div class=\"goods__flex-container\">";
                while ($outGoods = mysqli_fetch_assoc($resultGoods)) {
                    $goodsImgBase64 = base64_encode($outGoods['goods_img']);
                    echo "<div class=\"box-goods\">
                            <input type=\"checkbox\" name=\"goods-check[]\" value=\"{$outGoods['id_restourant_goods']}\">                            
                            <div class=\"box-goods__img\">
                                <div class=\"box-goods__heading\">
                                <h1>{$outGoods['goods_name']}</h1>
                                </div>
                               <img src=\"data:image/jpeg;base64,$goodsImgBase64\" alt=\"errorUpImage\">
                            </div>
                            <div class=\"box-goods__price\" data-price=\"{$outGoods['price']}\">
                               <h2>Цена: {$outGoods['price']} руб.</h2>
                            </div>  
                        </div>";
                }
                echo "</div>
                        <div class=\"form-booking\">
                                <input type=\"hidden\" name=\"id_rest\" value=\"{$outRest['id_restourant']}\">
                                <input class=\"form-booking__submit\" type=\"submit\" value=\"Добавить в корзину\">
                            </form>
                        </div>
                    </div>
                </div>";
            }
            echo "</div>";
        }
        ?>
    </section>
    <section class="my-aplication" id="myAplication">
        <div class="my-aplication__heading">
            <h2>Мои заказы</h2>
        </div>
        <div class="my-aplication__flex-container">
            <?php
            $aplicationResult = $connect->query("SELECT `aplication`.`id_aplication`, `aplication`.`user_address`, `aplication`.`date`, `aplication`.`time_start`, `aplication`.`price`, `aplication`.`status`, `restourants`.`name`, `restourants_img`.`restaurant_img` FROM `aplication` INNER JOIN `restourants` ON `restourants`.`id_restourant` = `aplication`.`id_restourant` INNER JOIN `restourants_img` ON `restourants_img`.`id_restourant` = `aplication`.`id_restourant` AND `aplication`.`id_user` = '$id_user'");
            if (mysqli_num_rows($aplicationResult) == 0) {
                echo "<div style=\"padding-top: 5%; padding-bottom: 5%; text-align: center;\"><h2>Заказов пока нет</h2></div>";
            } else {
                while ($outAplication = mysqli_fetch_assoc($aplicationResult)) {
                    $base64ImgAplication = base64_encode($outAplication['restaurant_img']);
                    echo "<div class=\"rest-box\">
                            <div class=\"rest-box-container\">
                                <div class=\"rest-box__heading\">
                                    <h1>{$outAplication['name']}</h1>
                                </div>
                                <div class=\"rest-box__img\">
                                    <img src=\"data:image/jpeg;base64,$base64ImgAplication\" alt=\"errorUpImage\">
                                </div>
                                <div class=\"aplication__data\">
                                    <h2>Дата:  {$outAplication['date']}</h2>
                                </div>
                                <div class=\"aplication__data\">
                                    <h2>Врема заказа:  {$outAplication['time_start']}</h2>
                                </div>
                                <div class=\"aplication__data\">
                                    <h2>Цена заказа:  {$outAplication['price']}</h2>
                                </div>
                                <div class=\"aplication__data\">
                                    <h2>Адрес доставки:  {$outAplication['user_address']}</h2>
                                </div>
                                <div class=\"aplication__data-goods\">
                                    <h2>Товары:</h2>
                                </div>
                    ";
                    $aplicationGoodsResult=$connect->query("SELECT `restourants_goods`.`goods_name`, `restourants_goods`.`goods_category`, `restourants_goods`.`price`, `restourants_goods_img`.`goods_img` FROM `aplication_goods` INNER JOIN `restourants_goods` ON `restourants_goods`.`id_restourant_goods` = `aplication_goods`.`id_restourant_goods` INNER JOIN `restourants_goods_img` ON `restourants_goods_img`.`id_restourant_goods` = `aplication_goods`.`id_restourant_goods` INNER JOIN `aplication` ON `aplication`.`id_aplication` = `aplication_goods`.`id_aplication` AND `aplication_goods`.`id_aplication` = '{$outAplication['id_aplication']}'");
                    while($outAplicationGoods = mysqli_fetch_assoc($aplicationGoodsResult)){
                        $aplicationGoodsImg = base64_encode($outAplicationGoods['goods_img']);
                        echo "<div class=\"aplication-goods__flex-container\">
                                <div class=\"aplication-goods__img\">
                                    <img src=\"data:image/jpeg;base64,$aplicationGoodsImg\">
                                </div>
                                <div class=\"aplication-goods__data\">
                                    <h2>Название: {$outAplicationGoods['goods_name']}</h2>
                                    <h2>Категория: {$outAplicationGoods['goods_category']}</h2>
                                    <h2>Цена: {$outAplicationGoods['price']}</h2>
                                </div>
                        </div>";
                    }
                    echo "<div class=\"aplication__data-status\">
                            <h2>Статус:  {$outAplication['status']}</h2>
                    </div>
                    </div>
                        </div>";
                }
            }
            ?>
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
            <h2><a href="about.php">О нас</a></h2>
            <h2>Условия полиики и конфедициальности</h2>
            <h2 id="buttonContactFooter">Контакты</h2>
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
        const buttonContactFooter = document.getElementById('buttonContactFooter');
        buttonContactFooter.addEventListener('click', () => {
            if (getComputedStyle(contactsBlock).display == 'none') {
                contactsBlock.style.display = 'block';
                closeContactBlock.addEventListener('click', () => {
                    if (getComputedStyle(contactsBlock).display == 'block') {
                        contactsBlock.style.display = 'none';
                    }
                });
            }
        });
        // module - > add img user
        const containerAddUserImg = document.getElementById('containerAddUserImg');
        const formAddUserImg = document.getElementById('formAddUserImg');
        const buttonAddImg = document.getElementById('buttonAddImg');
        buttonAddImg.addEventListener('click', () => {
            if (getComputedStyle(containerAddUserImg).display == 'none') {
                containerAddUserImg.style.display = 'flex';
                containerAddUserImg.querySelector('.contacts__close').addEventListener('click', () => {
                    if (getComputedStyle(containerAddUserImg).display == 'flex') {
                        containerAddUserImg.style.display = 'none';
                    }
                });
            }
        });
        formAddUserImg.addEventListener('submit', (e) => {
            e.preventDefault();
            const userImg = document.getElementById('userImg');
            let errorArr = [];
            if (userImg.value == '') {
                userImg.nextElementSibling.innerHTML = 'Поле пусто';
                errorArr.push(false);
            }
            if (userImg.files[0].type == 'image/jpeg' || userImg.files[0].type == 'image/png' && userImg.value != '') {
                console.log('ok')
            } else {
                userImg.nextElementSibling.innerHTML = 'Файл не является изображением';
                errorArr.push(false);
                console.log(userImg.files[0].type)
                userImg.addEventListener('change', () => {
                    userImg.nextElementSibling.innerHTML = '';
                });
            }
            if (errorArr.length == 0) {
                formAddUserImg.submit();
            }
        });
        const buttonBasket = document.querySelector('.header__basket');
        buttonBasket.addEventListener('click', () => {
            if (document.getElementById('clickUserPage') != null) {
                window.location.href = 'user_basket.php';
            } else {
                moduleAutoRegistr.style.display = 'block';
                blockModuleAutorization.style.display = 'block';
            }
        });

        // form delete-rest
        const formDeleteRestBox = document.querySelectorAll('.form-delete-rest-box');
        formDeleteRestBox.forEach((elem) => {
            elem.querySelector('.img-delete-icon').addEventListener('click', () => {
                elem.submit();
            });
        });
    </script>
</body>

</html>