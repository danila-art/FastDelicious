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
                    <h2><a href="">Контакты</a></h2>
                </div>
                <div class="header__restaurant">
                    <div class="header__restaurant-profile">
                        <img src="../img/icons/user.png" alt="errorUpImage">
                    </div>
                </div>
            </div>
        </div>
        <div class="header__content">
            <div class="header__heading">
                <h1>Зарегистрируй профиль своего ресторана</h1>
            </div>
            <div class="header__h2">
                <h2>Листай ниже, заполняй форму или уже есть профиль, атворизируйся<h2>
            </div>
            <div class="header__h2">
                <h2>После регистрации профиля переходи в личный кабинет и добавляй товары, чтобы пользователь
                    мог заказать их.</h2>
            </div>
        </div>
    </header>
    <section class="main">
        <div class="main__form-add-restorant" id="blockAddRestorant">
            <div class="main__form-heading">
                <h2>Регистарция профиля</h2>
            </div>
            <form action="" method="post" enctype="multipart/form-data" id="form-add-restourant">
                <div class="main__form-input">
                    <h3>Введите название ресторана</h3>
                    <input type="text" name="" class="input-box-add">
                    <h4></h4>
                </div>
                <div class="main__form-input">
                    <h3>Введите краткое описание</h3>
                    <input type="text" name="" class="input-box-add">
                    <h4></h4>
                </div>
                <div class="main__form-input">
                    <h3>Введите категорию товаров ресторана(суши, пицца или другое)</h3>
                    <input type="text" name="" class="input-box-add">
                    <h4></h4>
                </div>
                <div class="main__form-input-file">
                    <h3>Загрузите фоновую заставку для ресторана</h3>
                    <input type="file" name="file_img" id="file-img" class="input-box-add">
                    <h4></h4>
                </div>
                <div class="main__form-input">
                    <h3>Придумайте логин</h3>
                    <input type="text" name="" class="input-box-add">
                    <h4></h4>
                </div>
                <div class="main__form-input">
                    <h3>Придумайте пароль</h3>
                    <input type="password" name="" class="input-box-add">
                    <h4></h4>
                </div>
                <div class="main__form-input">
                    <h3>Повторите пароль</h3>
                    <input type="password" name="" class="input-box-add">
                    <h4></h4>
                </div>
                <div class="main__form-submit">
                    <input type="submit" value="Зарегестрироваться">
                </div>
                <div class="main__connect-block">
                    <h2>Уже есть профиль?</h2>
                    <h2 class="button-connect" id="buttonRegRest">Войти</h2>
                </div>
            </form>
        </div>
        <div class="main__form-inner-profile" id="blockInnerProfile">
            <div class="main__form-heading">
                <h2>Войдите в профиль</h2>
            </div>
            <form action="" method="post" id="form-inner-restourant">
                <div class="main__form-input">
                    <h3>Логин</h3>
                    <input type="text" name="" class="input-box-add">
                    <h4></h4>
                </div>
                <div class="main__form-input">
                    <h3>Пароль</h3>
                    <input type="password" name="" class="input-box-add">
                    <h4></h4>
                </div>
                <div class="main__form-submit">
                    <input type="submit" value="Войти">
                </div>
                <div class="main__connect-block">
                    <h2>Ещё нет профиля?</h2>
                    <h2 class="button-connect" id="buttonInRest">Создать профиль</h2>
                </div>
            </form>
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
    <script src="../js/script_restaurant.js"></script>
</body>

</html>