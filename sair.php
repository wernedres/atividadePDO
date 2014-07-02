<?php
include 'restrito_login.php';
session_start();

//DESTRÓI AS SESSOES
unset($_SESSION['nome']);
unset($_SESSION['senha']);


header("Location:index.php");
