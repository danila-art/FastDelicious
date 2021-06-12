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
    <title>Fast Delicious - Корзина</title>
    <link rel="stylesheet" href="../css/main_style.css">
    <link rel="shortcut icon" href="../img/logo/logo_1-1.png">
    <link rel="stylesheet" href="../css/registration_autorization_style.css">
    <!-- style this page -->
    <link rel="stylesheet" href="../css/user_basket_style.css">
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
                    <h2><a href="">Мои заказы</a></h2>
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
    <section class="main-busket">
        <div class="main-busket__heading">
            <h2>Корзина</h2>
        </div>
        <?php
        $resultBasket = $connect->query("SELECT `user_basket`.`id_restourant_goods`, `restourants_goods`.`goods_name`, `restourants_goods`.`goods_category`, `restourants_goods_img`.`goods_img`, `restourants`.`name`, `restourants`.`category`, `restourants_goods`.`price` FROM `user_basket` INNER JOIN `restourants` ON `restourants`.`id_restourant` = `user_basket`.`id_restourant` INNER JOIN `restourants_goods` ON `restourants_goods`.`id_restourant_goods` = `user_basket`.`id_restourant_goods` INNER JOIN `restourants_goods_img` ON `restourants_goods_img`.`id_restourant_goods` = `user_basket`.`id_restourant_goods` AND `user_basket`.`id_user` = '$id_user'");
        if(mysqli_num_rows($resultUser) == 0){
            echo "<div class=\"no-goods\"><h2>Корзина пуста</h2></div>";
        }else{
            while($outGoods = mysqli_fetch_assoc($resultBasket)){
                $imgBase64 = base64_encode($outGoods['goods_img']);
                echo "<div class=\"basket-box\">
                        <div class=\"basket-box__flex-container\">
                            <div class=\"basket-box__img-goods\">
                                <img src=\"data:image/jpeg;base64,$imgBase64\">
                            </div>
                            <div class=\"basket-box__text-content\">
                                <h2>Название товара: {$outGoods['goods_name']}</h2>
                                <h2>Категория товара: {$outGoods['goods_category']}</h2>
                                <h2>Название ресторана: {$outGoods['name']}</h2>
                                <h2>Категория товаров ресторана: {$outGoods['category']}</h2>
                            </div>
                            <div class=\"basket-box__price\" data-price=\"{$outGoods['price']}\">
                                <h2>Цена: {$outGoods['price']}</h2>
                            </div>
                        </div>
                        <div class=\"basket-box__delete\">
                            <form action=\"../php/delete_basket_goods.php\" method=\"post\">
                                <input type=\"hidden\" name=\"id_goods\" value=\"{$outGoods['id_restourant_goods']}\">
                                <input type=\"submit\" value=\"Удалить\">
                            </form>
                        </div>
                    </div>";
            }
            
            echo "<div class=\"add-aplication\">
                <form action=\"../php/add_aplication.php\" method=\"post\" id=\"formInputAplication\">
                <input type=\"hidden\" name=\"id_user\" value=\"$id_user\">";
                    $aplicationInputRest = $connect->query("SELECT DISTINCT(`user_basket`.`id_restourant`) FROM `user_basket` WHERE `user_basket`.`id_user` = '$id_user'");
                    while($outRest = mysqli_fetch_assoc($aplicationInputRest)){
                        echo "<input type=\"hidden\" name=\"id_rest\" value=\"{$outRest['id_restourant']}\">";
                    }
                    $aplicationInputResult = $connect->query("SELECT `user_basket`.`id_restourant`, `user_basket`.`id_restourant_goods` FROM `user_basket` WHERE `user_basket`.`id_user` = '$id_user'");
                    while($out = mysqli_fetch_assoc($aplicationInputResult)){
                        echo "<input type=\"hidden\" name=\"id_goods[]\" value=\"{$out['id_restourant_goods']}\">";
                    }
                
            echo "
                <div class=\"total-price-to-aplication\">
                    <h2 class=\"total-price-to-aplication__h2\">Итоговая стоимость:</h2>
                </div>
                <div class=\"address-aplication\">
                    <h2>Введите адрес, куда доставить</h2>
                    <input type=\"text\" name=\"address\" id=\"checkAddres\"> 
                    <h4 style=\"color:red\"></h4>
                </div>
                <div class=\"go-aplication__submit\">
                    <input type=\"submit\" value=\"Заказать\">
                </div>
                </form>
            </div>";
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
                window.location.href = 'user_page.php';
            });
        }
        //total-price
        const outTotalPrice = document.querySelector('.total-price-to-aplication__h2');
        let totalPrice = 0;
        document.querySelectorAll('.basket-box__price').forEach((elem)=>{
            totalPrice += parseInt(elem.getAttribute('data-price'));
        });
        console.log(totalPrice);
        outTotalPrice.innerHTML = 'Итоговая стоимость: ' + totalPrice + ' руб.';
        const formInputAplication = document.getElementById('formInputAplication');
        formInputAplication.addEventListener('submit', (e)=>{
            e.preventDefault();
            const checkAddres = document.getElementById('checkAddres');
            if(checkAddres.value == ''){
                checkAddres.nextElementSibling.innerHTML = 'Поле пусто';
                checkAddres.addEventListener('keydown', ()=>{
                    checkAddres.nextElementSibling.innerHTML = '';
                })
                console.log('Поле пусто');
            }else{
                console.log('Поле не пусто');
                formInputAplication.submit();
            }
        });
    </script>
</body>

</html>