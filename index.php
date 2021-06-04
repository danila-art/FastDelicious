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
                <div class="header__user">
                    <div class="header__user-img" id="userBlock">
                        <img src="img/icons/user.png" alt="errorUpImage">
                    </div>
                </div>
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
                <h2>Если вы ищите работу, то перейдите во вкладку курьерам и зарегистрируйте себя в системе</h2>
            </div>
            <div class="header__h2">
                <h2>Или же просто желаете вкусно покушать, то листайте ниже.</h2>
            </div>
        </div>
    </header>
    <section class="main">
        <div class="main__restourant-category">
            <!-- После добавления ресторанов -->
        </div>
        <div class="main__restorants">
            <!-- тут будут отображаться блоки с ресторанами -->
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
    <script src="js/script_registr_autorization.js"></script>
</body>

</html>