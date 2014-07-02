
<?php include_once 'pg_connect.php'; ?>


<?php

$nome = $_POST['nome'];
$senha = (md5($_POST['senha']));



$stmt = $db->prepare(" SELECT * from usuarios WHERE user_nome = '$nome' AND user_senha = '$senha' ");
$stmt->execute();

if ($stmt->fetch()) {

    session_start();

    $_SESSION['nome'] = $nome;
    $_SESSION['senha'] = $senha;

    header('location: index.php');
} else {

    echo '<script> alert("Usuario ou Senha invalidos")</script>;';
    echo '<script>window.location.replace("pageLogin.php")</script>;';
}



