
<?php include_once 'header.php'; ?>
 <?php include_once 'menu.php'; ?>
<?php include_once 'pg_connect.php';?>


<!DOCTYPE html>
<html>
<head>
	<title>formulario de contato</title>
</head>



<?php



$nome      = strip_tags(trim($_POST['nome']));
$telefone  = strip_tags(trim($_POST['telefone']));
$email     = strip_tags(trim($_POST['email']));
$endereco  = strip_tags(trim($_POST['endereco']));
$numero    = strip_tags(trim($_POST['numero']));
$bairro    = strip_tags(trim($_POST['bairro']));
$profissao = strip_tags(trim($_POST['profissao']));

if(isset($_POST['enviar'])){

   $pg_inserir = 'INSERT INTO contatos (cont_nome, cont_telefone,cont_email,cont_endereco,cont_numero,cont_bairro,cont_profissao)';
     $pg_inserir .= 'values (:nome, :telefone, :email,:endereco,:numero,:bairro,:profissao)';
   


	try{
		$query_inserir = $db->prepare($pg_inserir);
		$query_inserir->bindValue(':nome',$nome,PDO::PARAM_STR);
		$query_inserir->bindValue(':telefone',$telefone,PDO::PARAM_STR);
	    $query_inserir->bindValue(':email',$email,PDO::PARAM_STR);
		$query_inserir->bindValue(':endereco',$endereco,PDO::PARAM_STR);
	   	$query_inserir->bindValue(':numero',$numero,PDO::PARAM_STR);
	   	$query_inserir->bindValue(':bairro',$bairro,PDO::PARAM_STR);
        $query_inserir->bindValue(':profissao',$profissao,PDO::PARAM_STR);
        $query_inserir->execute();

      
      echo "<script>alert('Usuario cadastrado com sucesso')</script>";

	}catch (PDOexception $erro_cadastro){
		echo "erro ao  cadastrar".$erro_cadastro->getMessage;
	}


}

?>


<body>


    <form action"" method="post">

	<label>NOME:<input type="text" name="nome"/></label><br/>
	<label>TELEFONE:<input type="text" name="telefone"/></label><br/>
	<label>Email:<input type="text" name="email"/></label><br/>
	<label>ENDERECO:<input type="text" name="endereco"/></label><br/>
	<label>NUMERO:<input type="text" name="numero"></label><br/>
	<label>BAIRRO:<input type="text" name="bairro"></label><br/>
	<label>PROFISSAO:<input type="text" name="profissao"/></label><br/>
	<input type="submit" name="enviar" value="Cadastrar"/>
	

	</form>




<?php include_once 'footer.php'; ?>

</body>
</html>