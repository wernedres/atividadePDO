<?php

session_start();

if (!isset($_SESSION['nome']) AND ! isset($_SESSION['senha'])) {
    session_destroy();

    unset($_SESSION['nome']);
    unset($_SESSION['senha']);

    header('location: pageLogin.php');
}