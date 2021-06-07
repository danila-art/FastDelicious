<?php
if (!empty($_COOKIE['loginUser'])) {
    setcookie('loginUser', '', time() - 1000000, '/');
    header('location: ../index.php');
}
