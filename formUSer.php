
<?php include_once 'header.php'; ?>
 <?php include_once 'menu.php'; ?>
<?php include_once 'pg_connect.php';?>

<!DOCTYPE html>
<html>
<head>
  <title>formulario de contato</title>
</head>
<?php

$nome        = strip_tags (trim($_POST['nome']));
$email       = strip_tags (trim($_POST['email']));
$senha    = strip_tags (trim($_POST['senha']));



if(isset($_POST['enviar'])){
   $pg_inserir = 'INSERT INTO usuarios(user_nome,user_email,user_senha)';
   $pg_inserir .= 'values (:nome,:email, :senha)';

 
  try{
       $query_inserir = $db->prepare($pg_inserir);
       $query_inserir->bindValue(':nome',$nome,PDO::PARAM_STR);
       $query_inserir->bindValue(':email', $email. PDO::PARAM_STR);
       $query_inserir->bindValue(':senha', $senha. PDO::PARAM_STR);
       $query_inserir->execute();

      echo "<script>alert('Usuario cadastrado com sucesso')</script>";

    }catch(PDOexception $erro_cadastro){
    echo 'error ao cadastrar'.$erro_cadastro->getMessage;
   }
}

?>
<body>


    <form action"" method="post">

  <label>NOME:<input type="text" name="nome"/></label><br/>
  <label>Email:<input type="text" name="email"/></label><br/>
    <label>SENHA:<input type="password" name="senha"/></label><br/>
  <input type="submit" name="enviar" value="Cadastrar"/>
  

  </form>



<?php include_once 'footer.php'; ?>

</body>
</html>