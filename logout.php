<?php
session_start();
session_destroy();
unset($_SESSION['nome']); //destroi a sessao do login
header("location:pageLogin.php"); //direciona para pagina secreto.php
?>


