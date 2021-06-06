<?php
if(!empty($_COOKIE['loginRest'])){
setcookie('loginRest', '', time()-1000000, '/');
header('location: ../page/restaurants.php');
}

?>