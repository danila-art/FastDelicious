<?php
if (!empty($_POST['id_rest'])) {
    $id_rest = $_POST['id_rest'];
} else {
    $id_rest = null;
}
if ($id_rest != null) {
    require_once '../php/connection.php';
    $restNameRest = '';
    $restName = $connect->query("SELECT `restourants`.`name` FROM `restourants` WHERE `id_restourant` = '$id_rest'");
    while ($outRestTitle = mysqli_fetch_assoc($restName)) {
        $restNameRest = $outRestTitle['name'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Delicious - <? echo $restNameRest ?></title>
    <link rel="stylesheet" href="../css/main_style.css">
    <link rel="shortcut icon" href="../img/logo/logo_1-1.png">
    <!-- style autorization and registration -->
    <link rel="stylesheet" href="../css/registration_autorization_style.css">
    <link rel="stylesheet" href="../css/goods_style.css">
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
    <section class="block__registr-autorization" id="moduleAutoRegistr">
        <div class="block__autorization" id="moduleAutorization">
            <div class="block__close-icon" onclick="closeModule(this)">
                <img src="../img/icons/cancel.png" alt="errorUpImage">
            </div>
            <form action="../php/user_autorization.php" method="POST" onsubmit="return AutorizationCheck()">
                <div class="block__inner">
                    <h2>Авторизация</h2>
                    <div class="block__registr-input-box">
                        <h3>Логин</h3>
                        <input type="text" name="login">
                        <h4></h4>
                    </div>
                    <div class="block__registr-input-box">
                        <h3>Пароль</h3>
                        <input type="password" name="password">
                        <h4></h4>
                    </div>
                    <div class="block__autorization-submit-box">
                        <input type="submit" value="Авторизироваться">
                    </div>
                    <div class="block__link">
                        <h3>Если вы еще не зарегистрированы</h3>
                        <h3 id="registrLink">Зарегистрируйтесь</h3>
                    </div>
                </div>
            </form>
        </div>
        <div class="block__registr" id="moduleRegistr">
            <div class="block__close-icon" onclick="closeModule(this)">
                <img src="../img/icons/cancel.png" alt="errorUpImage">
            </div>
            <form action="../php/user_registration.php" method="POST" onsubmit="return registrCheck();">
                <div class="block__inner">
                    <h2>Регистарция</h2>
                    <div class="block__registr-input-box">
                        <h3>Введите ФИО</h3>
                        <input type="text" name="FIO">
                        <h4></h4>
                    </div>
                    <div class="block__registr-input-box">
                        <h3>Придумайте логин</h3>
                        <input type="text" name="login">
                        <h4></h4>
                    </div>
                    <div class="block__registr-input-box">
                        <h3>Введите email</h3>
                        <input type="email" name="email">
                        <h4></h4>
                    </div>
                    <div class="block__registr-input-box">
                        <h3>Придумайте пароль</h3>
                        <input type="password" name="password">
                        <h4></h4>
                    </div>
                    <div class="block__registr-input-box">
                        <h3>Повторите пароль</h3>
                        <input type="password" name="password">
                        <h4></h4>
                    </div>
                </div>
                <div class="block__registr-input-box-check">
                    <div class="block__registr-input-box-check-flex">
                        <input type="checkbox" checked>
                        <h3>Я принимаю условия политики и конфедициальности</h3>
                    </div>
                    <h4></h4>
                </div>
                <div class="block__registr-submit-box">
                    <input type="submit" value="Зарегистрироваться">
                </div>
                <div class="block__link">
                    <h3>Если уже зарегистрированы</h3>
                    <h3 id="autorizationLink">Войдите</h3>
                </div>
            </form>
        </div>
    </section>
    <header class="header-goods-page">
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
    <section class="restaurant-container">
        <?php
        require_once '../php/connection.php';
        $resultRestaurant = $connect->query("SELECT `restourants`.`name`, `restourants`.`description`, `restourants`.`category`, `restourants_img`.`restaurant_img` FROM `restourants` INNER JOIN `restourants_img` ON `restourants`.`id_restourant` = `restourants_img`.`id_restourant` AND `restourants`.`id_restourant` = '$id_rest'");
        while ($outRestaurant = mysqli_fetch_assoc($resultRestaurant)) {
            $base64ImgRest = base64_encode($outRestaurant['restaurant_img']);
            echo "<div class=\"restaurant-container__img-box\">
                    <img src=\"data:image/jpeg;base64,$base64ImgRest\" alt=\"errorUpImage\">
                    <div class=\"restaurant-container__text-content\">
                        <div class=\"restaurant-container__name-restaurant\">
                            <h1>{$outRestaurant['name']}</h1>
                        </div>
                        <div class=\"restaurant-container__description\">
                            <h2>{$outRestaurant['description']}</h2>
                        </div>
                        <div class=\"restaurant-container__category\">
                            <h2>Категория: {$outRestaurant['category']}</h2>
                        </div>
                    </div>
                </div>";
        }
        ?>
    </section>
    <section class="goods-container">
        <?php
        require_once '../php/connection.php';
        $resultCategoryGoods = $connect->query("SELECT DISTINCT(`restourants_goods`.`goods_category`) FROM `restourants_goods` WHERE `id_restourant` = '$id_rest'");
        echo "<div class=\"category__container\">
                    <div class=\"category__flex-container\">
                    <div class=\"category__box\" id=\"allGoods\">
                        <h2>Все</h2>
                    </div>";
        while ($goodsCategory = mysqli_fetch_assoc($resultCategoryGoods)) {
            echo "<div class=\"category__box category-goods-button\" data-category=\"{$goodsCategory['goods_category']}\">
                <h2>{$goodsCategory['goods_category']}</h2>
            </div>";
        }
        echo "   </div>
            </div>
            <div class=\"goods\">";
        $resultGoods = $connect->query("SELECT `restourants_goods`.`goods_name`, `restourants_goods`.`goods_description`, `restourants_goods`.`goods_category`, `restourants_goods`.`price`, `restourants_goods_img`.`goods_img` FROM `restourants_goods` INNER JOIN `restourants_goods_img` ON `restourants_goods`.`id_restourant_goods` = `restourants_goods_img`.`id_restourant_goods` AND `restourants_goods`.`id_restourant` = '$id_rest'");
        $countGoods = mysqli_num_rows($resultGoods);
        if ($countGoods == 0) {
            echo "<div class=\"box-no-goods\">
                    <h2>Нет ни одного товара</h2>
                </div>";
        } else {
            $goodsOutPut = $connect->query("SELECT `restourants_goods`.`id_restourant_goods`, `restourants_goods`.`goods_name`, `restourants_goods`.`goods_description`, `restourants_goods`.`goods_category`, `restourants_goods`.`price`, `restourants_goods_img`.`goods_img` FROM `restourants_goods` INNER JOIN `restourants_goods_img` ON `restourants_goods`.`id_restourant_goods` = `restourants_goods_img`.`id_restourant_goods` AND `restourants_goods`.`id_restourant` = '$id_rest'");
            echo "<div class=\"goods__flex-container\">";
            while ($goods = mysqli_fetch_assoc($goodsOutPut)) {
                $imgGoods = base64_encode($goods['goods_img']);
                echo "<div class=\"goods__box\" data-categoryGoods=\"{$goods['goods_category']}\">
                        <div class=\"goods__heading\">
                            <h1>{$goods['goods_name']}</h1>
                        </div>
                        <div class=\"goods_description\">
                            <h2>{$goods['goods_description']}</h2>
                        </div>
                        <div class=\"goods__img\">
                            <img src=\"data:image/jpeg;base64,$imgGoods\" alt=\"errorUpImage\">
                        </div>
                        <div class=\"goods__category\">
                            <h2 class=\"goods-category-block\">Категория:  {$goods['goods_category']}</h2>
                        </div>
                        <div class=\"goods__price\">
                        <h2>Цена:   {$goods['price']} руб</h2>
                        </div>
                        <div class=\"goods__button-add-box\">
                            <form action=\"../php/add_goods_to_box.php\" method=\"post\" class=\"form-button-add-box\">
                                <input type=\"hidden\" name=\"id_goods\" value=\"{$goods['id_restourant_goods']}\">
                                <input type=\"submit\" value=\"Добавить в корзину\" class=\"goods_submit\">
                                <h4 style=\"text-align: center; color: red;\"></h4>
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
        // user-active
        if (document.getElementById('clickUserPage') != null) {
            document.getElementById('clickUserPage').addEventListener('click', () => {
                window.location.href = '../page/user_page.php';
            });
        }
        // script button add goods
        if ('<? echo $_COOKIE['loginUser'] ?>' == '') {
            const goodsBoxCollection = document.querySelectorAll('.goods__box');
            goodsBoxCollection.forEach((elem) => {
                const formButtonAddBox = elem.querySelector('.form-button-add-box');
                const goods_submit = elem.querySelector('.goods_submit');
                formButtonAddBox.addEventListener('submit', (e) => {
                    e.preventDefault();
                    goods_submit.nextElementSibling.innerHTML = 'Вы не авторизированы';
                });
            });

        }
        // go to basket
        const buttonBasket = document.querySelector('.header__basket');
        buttonBasket.addEventListener('click', () => {
            if (document.getElementById('clickUserPage') != null) {
                window.location.href = 'user_basket.php';
            } else {
                moduleAutoRegistr.style.display = 'block';
                blockModuleAutorization.style.display = 'block';
            }
        });
    </script>
    <script src="../js/filter.js"></script>
    <?php
    if (empty($_COOKIE['loginUser'])) {
        echo "<script src=\"../js/script_registr_autorization.js\"></script>";
    }
    ?>
</body>

</html>