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
            <h2>Корзина</h2>
        </div>
        <?php
        require_once '../php/connection.php';
        $resultUserBox = $connect->query("SELECT * FROM `user_box` WHERE `id_user` = '$id_user'");
        if (mysqli_num_rows($resultUserBox) == 0) {
            echo "<div class=\"no-goods\">
                        <h2>Корзина пуста</h2>                
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
                        <div class=\"rest-box__heading\">
                            <h1>{$outRest['name']}</h1>
                        </div>
                        <div class=\"rest-box__img\">
                            <img src=\"data:image/jpeg;base64,$base64ImgRest\" alt=\"errorUpImage\">
                        </div>
                    ";
                $resultGoods = $connect->query("SELECT `restourants`.`name`, `restourants_img`.`restaurant_img`, `restourants_goods`.`goods_name`,`restourants_goods`.`price`, `restourants_goods_img`.`goods_img` FROM `user_box` INNER JOIN `restourants` ON `restourants`.`id_restourant` = `user_box`.`id_restourant` INNER JOIN `restourants_img` ON `restourants`.`id_restourant` = `restourants_img`.`id_restourant` INNER JOIN `restourants_goods` ON `user_box`.`id_restourant_goods` = `restourants_goods`.`id_restourant_goods` INNER JOIN `restourants_goods_img` ON `restourants_goods`.`id_restourant_goods` = `restourants_goods_img`.`id_restourant_goods` AND `user_box`.`id_user` = '$id_user' AND `restourants`.`id_restourant` = '$id_restourant'");
                echo "<div class=\"goods__flex-container\">";
                while ($outGoods = mysqli_fetch_assoc($resultGoods)) {
                    $goodsImgBase64 = base64_encode($outGoods['goods_img']);
                    echo "<div class=\"box-goods\">
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
                    <div class=\"box-goods__total-price\">
                        <h2 class=\"box-goods__total-price-h2\">Итоговая стоимость: </h2>
                        <form action=\"\" method=\"post\" class=\"form-booking\">
                        <input class=\"total-price\" type=\"hidden\" name=\"total_price\" value=\"\">
                    </div>
                    <div class=\"form-booking\">
                            <input type=\"hidden\" name=\"id_rest\" value=\"{$outGoods['id_restourant']}\">
                            <div class=\"form-booking__input-container\">
                                <div class=\"form-booking__input-box\">
                                    <h2>Выберите время, когда привезти вам заказ, учтите доставка от 45 минут</h2>
                                    <input class=\"form-booking__input\" type=\"time\" name=\"time_end\">
                                    <h4 style=\"color:red; text-align: center;\"></h4>
                                </div>
                            </div>
                            <input class=\"form-booking__submit\" type=\"submit\" value=\"Заказать\" data-active=\"0\">
                        </form>
                    </div>
                </div>";
            }
            echo "</div>";
        }
        ?>
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
        // total price
        const boxCollection = document.querySelectorAll('.rest-box');
        boxCollection.forEach((elem) => {
            let totalPrice = 0;
            const priceCollection = elem.querySelectorAll('.box-goods__price');
            priceCollection.forEach((price) => {
                totalPrice += parseInt(price.getAttribute('data-price'));
            });
            console.log(totalPrice);
            elem.querySelector('.box-goods__total-price-h2').innerHTML = 'Итоговая стоимость: ' + totalPrice + ' руб.';
            elem.querySelector('.total-price').value = totalPrice;

            elem.querySelector('.form-booking').addEventListener('submit', (e) => {
                e.preventDefault();
                const formBookingInputContainer = elem.querySelector('.form-booking__input-container');
                const formBookingInput = elem.querySelector('.form-booking__input');
                const formBookingSubmit = elem.querySelector('.form-booking__submit');
                if (formBookingSubmit.getAttribute('data-active') == 0) {
                    if (getComputedStyle(formBookingInputContainer).display == 'none') {
                        formBookingInputContainer.style.display = 'block';
                        formBookingSubmit.dataset.active = 1;
                    }
                } else if (formBookingSubmit.getAttribute('data-active') == 1) {
                    if (formBookingInput.value == '') {
                        formBookingInput.nextElementSibling.innerHTML = 'Поле пусто';
                    } else {
                        const thisDate = new Date;
                        const thisDay = thisDate.getDate();
                        const thisHours = thisDate.getHours();
                        const thisMinutes = thisDate.getMinutes();
                        console.log(thisDay + '->' + thisHours + ' ' + thisMinutes);
                        console.log(formBookingInput.value);
                    }
                }
            });
        });
    </script>
</body>

</html>