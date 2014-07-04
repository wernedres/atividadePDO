
<?php include_once 'pg_connect.php'; ?>


<?php

$nome = $_POST['nome'];
$senha = md5($_POST['senha']);

 $pg_read = (" SELECT * from usuarios WHERE user_nome = '$nome' AND user_senha = '$senha' ");
 
 $read= $db->prepare($pg_read);
 $read->execute();

 if( $rs = $read->fetch(PDO::FETCH_OBJ) ) {
 
    session_start();

    $_SESSION['nome'] = $rs->user_nome;
    $_SESSION['senha'] = $rs->user_senha;
    $_SESSION['leitura'] = $rs->leitura;
    $_SESSION['escrita'] = $rs->escrita;
    $_SESSION['permissao'] = $rs->permissao;
 

    header('location: index.php');
} else {

    echo '<script> alert("Usuario ou Senha invalidos")</script>;';
    echo '<script>window.location.replace("pageLogin.php")</script>;';
}



?>



