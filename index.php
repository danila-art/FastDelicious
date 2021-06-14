<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Delicious - Главная страница</title>
    <link rel="stylesheet" href="css/main_style.css">
    <link rel="shortcut icon" href="img/logo/logo_1-1.png">
    <!-- style autorization and registration -->
    <link rel="stylesheet" href="css/registration_autorization_style.css">
    <!-- font-media -->
    <link rel="stylesheet" href="css/font_media.css">
</head>

<body>
    <section class="contacts" id="contactsBlock">
        <div class="contacts__box">
            <div class="contacts__close">
                <img src="img/icons/cancel.png" alt="errorUpImage">
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
                <img src="img/icons/cancel.png" alt="errorUpImage">
            </div>
            <form action="php/user_autorization.php" method="POST" onsubmit="return AutorizationCheck()">
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
                <img src="img/icons/cancel.png" alt="errorUpImage">
            </div>
            <form action="php/user_registration.php" method="POST" onsubmit="return registrCheck();">
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
    <header class="header">
        <div class="header__fixed-block">
            <div class="header__flex">
                <div class="header__logo">
                    <img src="img/logo/logo_1-1.png" alt="errorUpImage">
                </div>
                <div class="header__nav">
                    <h2><a href="/">Главная</a></h2>
                    <h2><a href="page/restaurants.php">Ресторанам</a></h2>
                    <h2><a href="page/about.php">О нас</a></h2>
                    <h2 id="buttonContact">Контакты</h2>
                </div>
                <div class="header__basket">
                    <img src="img/icons/2849824-basket-buy-market-multimedia-shop-shopping-store_107977.png" alt="errorUpImage">
                </div>
                <?php
                if (!empty($_COOKIE['loginUser'])) {
                    $cookieLoginUser = $_COOKIE['loginUser'];
                    $id_user = '';
                    $loginUser = '';
                    require_once 'php/connection.php';
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
                            <img src=\"img/icons/user.png\" alt=\"errorUpImage\">
                            </div>";
                        }
                    }
                    echo "<div class=\"header__user\">
                                $headerUserImgTeg
                            <div class=\"header__user-name\">
                                <h2>$loginUser</h2>
                            </div>
                            <div class=\"header__user-exit\">
                                <h2><a href=\"php/exit_user.php\">Выйти</a></h2>
                            </div>
                        </div>";
                } else {
                    echo "<div class=\"header__user\">
                            <div class=\"header__user-img\" id=\"userBlock\">
                                <img src=\"img/icons/user.png\" alt=\"errorUpImage\">
                            </div>
                        </div>";
                }
                ?>
            </div>
        </div>
        <div class="header__content">
            <div class="header__heading">
                <h1>Добро пожаловать</h1>
            </div>
            <div class="header__h2">
                <h2>Здравствуй дорогой посетитель</h2>
            </div>
            <div class="header__h2">
                <h2>Если вы являетесь рестораном и хотите сотрудничать, то перейдите во вкладку ресторанам,
                    зарегистрируйте свой профиль и добавляйте товары.</h2>
            </div>
            <div class="header__h2">
                <h2>Или же просто желаете вкусно покушать, то листайте ниже.</h2>
            </div>
        </div>
    </header>
    <section class="main">
        <div class="main__restourant-category">
            <div class="main__nav">
                <div class="main__nav-flex">
                    <div class="main__h2">
                        <h2 id="mainAll">Все</h2>
                    </div>
                    <?php
                    require_once 'php/connection.php';
                    $resultCategory = $connect->query("SELECT DISTINCT(`category`) FROM `restourants`");
                    while ($categoryOutPut = mysqli_fetch_assoc($resultCategory)) {
                        echo "<div class=\"main__h2\">
                                <h2 class=\"main-category\" data-category=\"{$categoryOutPut['category']}\">{$categoryOutPut['category']}</h2>
                            </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="main__restorants">
            <?php
            require_once 'php/connection.php';
            $resultRest = $connect->query("SELECT `restourants`.`id_restourant`, `restourants`.`name`, `restourants`.`category`, `restourants_img`.`restaurant_img` FROM `restourants` INNER JOIN `restourants_img` ON `restourants`.`id_restourant` = `restourants_img`.`id_restourant`");
            while ($restOut = mysqli_fetch_assoc($resultRest)) {
                $restImg = base64_encode($restOut['restaurant_img']);
                echo "<div class=\"main__restorants-box\">
                        <form action=\"page/goods_page.php\" method=\"post\" class=\"form-rest\">
                            <input type=\"hidden\" name=\"id_rest\" value=\"{$restOut['id_restourant']}\">
                            <div class=\"main__restorants-box-img\">
                                <img src=\"data:image/jpg;base64,$restImg\" alt=\"errorUpImage\">
                            </div>
                            <div class=\"main__restorants-box-name\">
                                <h1>{$restOut['name']}</h1>
                            </div>
                            <div class=\"main__restorants-box-category\" data-boxCategory=\"{$restOut['category']}\">
                                <h2>Категория: {$restOut['category']}</h2>
                            </div>
                        </form>
                    </div>";
            }
            ?>
        </div>
    </section>
    <footer class="footer">
        <div class="footer__logo">
            <img src="img/logo/logo_1-2.png" alt="errorUpImage">
        </div>
        <div class="footer__heading">
            <h1>О компании</h1>
        </div>
        <div class="footer__flex">
            <h2><a href="page/about.php">О нас</a></h2>
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
        // user-active
        if (document.getElementById('clickUserPage') != null) {
            document.getElementById('clickUserPage').addEventListener('click', () => {
                window.location.href = 'page/user_page.php';
            });
        }
        // box-restaurant click script
        const formCollection = document.querySelectorAll('.main__restorants-box');
        formCollection.forEach((formElem) => {
            formElem.addEventListener('click', () => {
                formElem.querySelector('.form-rest').submit();
            });
        });
        // go to basket
        const buttonBasket = document.querySelector('.header__basket');
        buttonBasket.addEventListener('click', () => {
            if (document.getElementById('clickUserPage') != null) {
                window.location.href = 'page/user_basket.php';
            } else {
                moduleAutoRegistr.style.display = 'block';
                blockModuleAutorization.style.display = 'block';
            }
        });
    </script>
    <script src="js/filter.js"></script>
    <?php
    if (empty($_COOKIE['loginUser'])) {
        echo "<script src=\"js/script_registr_autorization.js\"></script>";
    }
    ?>

</body>

</html>