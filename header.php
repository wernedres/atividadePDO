<?php
session_start();
include_once 'pg_connect.php';
include_once 'funcoes.php';
protegePagina();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <title>Bootstrap Exemplo</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../fonts/glyphicons-halflings-regular.ttf"></script>

  </head>
  <body >

  
<div id="topo"><img src="../img/logo123.png">                


Bem vindo,<?php echo $_SESSION['nome']; ?>


 <a href='?acao=sair'>Deslogar</a>

            <?php
            if (isset($_GET['acao']) && $_GET['acao'] == "sair") {

                sairPagina();
            }
            ?>
</div>

  