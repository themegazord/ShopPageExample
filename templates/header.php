<?php
require_once("config/globals.php");
require_once("config/database.php");

?>

<!doctype html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google Fonts - Alexandria -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@300;500;700;900&display=swap" rel="stylesheet">

    <!-- FontAwesome -->

    <script src="https://kit.fontawesome.com/187a0c0ba5.js" crossorigin="anonymous"></script>

    <!-- Importação CSS -->
    <link rel="stylesheet" href="<?= $BASE_URL ?>src/css/styles.css">
    <title>Tuti - Sacolas Estampadas</title>
</head>
<body>
<header>
    <nav id="navbar">
        <div id="navbar-logoarea">
            <h1 class="logotitle">Tuti</h1>
            <span class="logosubtitle">Sacolas Estampadas</span>
        </div>

        <ul id="navbar-links">
            <li id="link"><a href="#">Loja</a></li>
            <li id="link"><a href="#">Sobre</a></li>
            <li id="link"><a href="#">FAQ</a></li>
            <li id="link"><a href="#">Contato</a></li>
        </ul>

        <div id="navbar-loginarea">
            <div id="login"><a href="<?= $BASE_URL ?>login.php"> <i class="fa-solid fa-circle-user"></i> <span class="login">Login</span></a>
            </div>
            <ul id="social-links">
                <li id="social-link"><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li id="social-link"><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li id="social-link"><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
                <li id="social-link"><a href="#"><i class="fa-solid fa-cart-shopping"></i> 1</a></li>
            </ul>
        </div>
    </nav>
</header>
