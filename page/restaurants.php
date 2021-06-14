<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ресторанам - создать профиль</title>
    <link rel="stylesheet" href="../css/main_style.css">
    <link rel="shortcut icon" href="../img/logo/logo_1-1.png">
    <!-- style this page -->
    <link rel="stylesheet" href="../css/restaurant_style.css">
    <link rel="stylesheet" href="../css/goods_style.css">
    <!-- font-media -->
    <link rel="stylesheet" href="../css/font_media.css">
</head>

<body>
    <section class="add-goods-module" id="addGoodsModule">
        <div class="add-goods-module__box">
            <div class="module__close" id="buttonCloseModule">
                <img src="../img/icons/cancel.png" alt="errorUpImage">
            </div>
            <form action="../php/add_goods.php" method="post" enctype="multipart/form-data" id="formAddGoods">
                <?php
                $cookieLoginRest = $_COOKIE['loginRest'];
                require_once '../php/connection.php';
                $idRestResult = $connect->query("SELECT `restourants`.`id_restourant` FROM `restourants` WHERE `login` = '$cookieLoginRest'");
                $idRest = '';
                while ($restOut = mysqli_fetch_assoc($idRestResult)) {
                    $idRest = $restOut['id_restourant'];
                }
                ?>
                <input type="hidden" name="id_rest" value="<? echo $idRest ?>">
                <div class="main__form-input">
                    <h3>Введите название</h3>
                    <input type="text" name="name" class="input-box-add">
                    <h4></h4>
                </div>
                <div class="main__form-input">
                    <h3>Введите краткое описание</h3>
                    <input type="text" name="desckription" class="input-box-add">
                    <h4></h4>
                </div>
                <div class="main__form-input">
                    <h3>Введите категорию товара</h3>
                    <input type="text" name="goods_category" class="input-box-add">
                    <h4></h4>
                </div>
                <div class="main__form-input-file">
                    <h3>Загрузите изображение товара</h3>
                    <input type="file" name="file_img" id="fileGoodsImg" class="input-box-add">
                    <h4></h4>
                </div>
                <div class="main__form-input">
                    <h3>Введите стоимость товара</h3>
                    <input type="text" name="goods_price" class="input-box-add">
                    <h4></h4>
                </div>
                <div class="main__form-submit">
                    <input type="submit" value="Добавить товар">
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
                $cookieLoginRest = $_COOKIE['loginRest'];
                require_once '../php/connection.php';
                $headerResult = $connect->query("SELECT `restourants`.`login`, `restourants_img`.`restaurant_img` FROM `restourants` INNER JOIN `restourants_img` ON`restourants`.`id_restourant` = `restourants_img`.`id_restourant` AND `restourants`.`login` = '$cookieLoginRest'");
                $headerCount = mysqli_num_rows($headerResult);
                if ($headerCount == 1) {
                    while ($headerOut = mysqli_fetch_assoc($headerResult)) {
                        $imgBase64 = base64_encode($headerOut['restaurant_img']);
                        echo "<div class=\"header__restaurant\">
                    <div class=\"header__restaurant-profile restaurant-profile-img\">
                        <img src=\"data:image/jpeg;base64, $imgBase64\" alt=\"errorUpImage\">
                    </div>
                    <div class=\"header__profile-login\">
                        <h1>{$headerOut['login']}</h1>
                    </div>
                    <div class=\"header__profile-exit\">
                        <h2><a href=\"../php/exit_profile.php\">Выйти</a></h2>
                    </div>
                </div>";
                    }
                } else {
                    echo "<div class=\"header__restaurant\">
                    <div class=\"header__restaurant-profile\">
                        <img src=\"../img/icons/user.png\" alt=\"errorUpImage\">
                    </div>
                </div>";
                }

                ?>

            </div>
        </div>
        <div class="header__content">
            <div class="header__heading">
                <?php
                if (!empty($_COOKIE['loginRest'])) {
                    echo "<h1>Вы вошли в профиль {$_COOKIE['loginRest']}</h1>";
                } else {
                    echo "<h1>Зарегистрируй профиль своего ресторана</h1>";
                }
                ?>
            </div>
            <div class="header__h2">
                <?php
                if (!empty($_COOKIE['loginRest'])) {
                    echo "<h2>Добавляй товары в профиль, не забудь указать к какой категории они относятся, для удобства клиента.</h2>";
                } else {
                    echo "<h2>Листай ниже, заполняй форму или уже есть профиль, атворизируйся<h2>";
                }
                ?>
            </div>
            <div class="header__h2">
                <?php
                if (!empty($_COOKIE['loginRest'])) {
                    echo "<h2>Проверяй новые заявки, меняй статусы заказа</h2>";
                } else {
                    echo "<h2>После регистрации профиля переходи в личный кабинет и добавляй товары, чтобы пользователь
                    мог заказать их.</h2>";
                }
                ?>
            </div>
        </div>
    </header>
    <?php
    if (!empty($_COOKIE['loginRest'])) {
        require_once '../php/connection.php';
        $idRestResult = $connect->query("SELECT `restourants`.`id_restourant` FROM `restourants` WHERE `login` = '$cookieLoginRest'");
        $idRest = '';
        while ($restOut = mysqli_fetch_assoc($idRestResult)) {
            $idRest = $restOut['id_restourant'];
        }
        $resultCategoryGoods = $connect->query("SELECT DISTINCT(`restourants_goods`.`goods_category`) FROM `restourants_goods` WHERE `id_restourant` = '$idRest'");
        echo "<div class=\"category__container\">
                    <div class=\"category__flex-container\">";
        while ($goodsCategory = mysqli_fetch_assoc($resultCategoryGoods)) {
            echo "<div class=\"category__box\" data-category=\"{$goodsCategory['goods_category']}\">
                <h2>{$goodsCategory['goods_category']}</h2>
            </div>";
        }
        echo "   </div>
            </div>
            <div class=\"goods\">";
        $resultGoods = $connect->query("SELECT `restourants_goods`.`goods_name`, `restourants_goods`.`goods_description`, `restourants_goods`.`goods_category`, `restourants_goods`.`price`, `restourants_goods_img`.`goods_img` FROM `restourants_goods` INNER JOIN `restourants_goods_img` ON `restourants_goods`.`id_restourant_goods` = `restourants_goods_img`.`id_restourant_goods` AND `restourants_goods`.`id_restourant` = '$idRest'");
        $countGoods = mysqli_num_rows($resultGoods);
        if ($countGoods == 0) {
            echo "<div class=\"box-no-goods\">
                <h2>Нет ни одного товара</h2>
            </div>
            <div class=\"add-goods\" id=\"buttonAddGoods\">   
                <h2>Добавить товар</h2>
            </div>
            ";
        } else {
            $goodsOutPut = $connect->query("SELECT `restourants_goods`.`goods_name`, `restourants_goods`.`goods_description`, `restourants_goods`.`goods_category`, `restourants_goods`.`price`, `restourants_goods_img`.`goods_img` FROM `restourants_goods` INNER JOIN `restourants_goods_img` ON `restourants_goods`.`id_restourant_goods` = `restourants_goods_img`.`id_restourant_goods` AND `restourants_goods`.`id_restourant` = '$idRest'");
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
                            <h2>Категория:  {$goods['goods_category']}</h2>
                        </div>
                        <div class=\"goods__price\">
                        <h2>Цена:   {$goods['price']} руб</h2>
                        </div>
                </div>";
            }
            echo "</div>
                <div class=\"add-goods\" id=\"buttonAddGoods\">   
                    <h2>Добавить товар</h2>
                </div>";
        }
        echo "<div class=\"aplication\">
                <div class=\"aplication__heading\">
                    <h2>Заказы</h2>
                </div>
                <div class=\"my-aplication__flex-container\">";
        $aplicationResult = $connect->query("SELECT `aplication`.`id_aplication`, `aplication`.`user_address`, `aplication`.`date`, `aplication`.`time_start`, `aplication`.`price`, `aplication`.`status`, `restourants`.`name`, `restourants_img`.`restaurant_img` FROM `aplication` INNER JOIN `restourants` ON `restourants`.`id_restourant` = `aplication`.`id_restourant` INNER JOIN `restourants_img` ON `restourants_img`.`id_restourant` = `aplication`.`id_restourant` AND `aplication`.`id_restourant` = '$idRest'");
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
                $aplicationGoodsResult = $connect->query("SELECT `restourants_goods`.`goods_name`, `restourants_goods`.`goods_category`, `restourants_goods`.`price`, `restourants_goods_img`.`goods_img` FROM `aplication_goods` INNER JOIN `restourants_goods` ON `restourants_goods`.`id_restourant_goods` = `aplication_goods`.`id_restourant_goods` INNER JOIN `restourants_goods_img` ON `restourants_goods_img`.`id_restourant_goods` = `aplication_goods`.`id_restourant_goods` INNER JOIN `aplication` ON `aplication`.`id_aplication` = `aplication_goods`.`id_aplication` AND `aplication_goods`.`id_aplication` = '{$outAplication['id_aplication']}'");
                while ($outAplicationGoods = mysqli_fetch_assoc($aplicationGoodsResult)) {
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
                        <form action=\"../php/update_status.php\" method=\"post\">
                            <input type=\"hidden\" name=\"id_aplication\" value=\"{$outAplication['id_aplication']}\">
                            <input type=\"hidden\" name=\"status\" value=\"Заказ принят\">
                            <input class=\"status-submit\" type=\"submit\" value=\"Заказ принят\">
                        </form>
                        <form action=\"../php/update_status.php\" method=\"post\">
                            <input type=\"hidden\" name=\"id_aplication\" value=\"{$outAplication['id_aplication']}\">
                            <input type=\"hidden\" name=\"status\" value=\"Заказ выполнен\">
                            <input class=\"status-submit__2\" type=\"submit\" value=\"Заказ выполнен\">
                        </form>
                    </div>
                </div>";
            }
        }

        echo "</div>
        </div>";
    } else {
        include 'module_reg_auto_profile.html';
    }
    ?>

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
    </script>
    <?php
    if (!empty($_COOKIE['loginRest'])) {
        echo "<script src =\"../js/script_rest_profile.js\"></script>";
    } else {
        echo "<script src=\"../js/script_restaurant.js\"></script>";
    }
    ?>
</body>

</html>