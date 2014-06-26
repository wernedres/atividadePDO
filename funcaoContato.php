<?php



$nome      = strip_tags(trim($_POST['nome']));
$telefone  = strip_tags(trim($_POST['telefone']));
$email     = strip_tags(trim($_POST['email']));
$endereco  = strip_tags(trim($_POST['endereco']));
$numero    = strip_tags(trim($_POST['numero']));
$bairro    = strip_tags(trim($_POST['bairro']));
$profissao = strip_tags(trim($_POST['profissao']));


if(isse($_POST['enviar'])){

   $pg_inserir="INSERT INTO contatos (cont_nome,cont_telefone,cont_email,cont_endereco,cont_numero,cont_bairro,cont_profissao)";
   $pg_inserir.= ":nome,:telefone:,:email,:endereco,:numero,:bairro,:profissao";




	try{
		$query_inserir = $db->prepare($pg_inserir);
		$query_inserir->bindValue(':nome',$nome,PDO::PARAM_STR);
		$query_inserir->bindValue(':telefone',$telefone,PDO::PARAM_STR);
	    $query_inserir->bindValue(':email',$email,PDO::PARAM_STR);
		$query_inserir->bindValue(':endereco',$endereco,PDO::PARAM_STR);
	    $query_inserir->bindValue(':numero',$numero,PDO::PARAM_STR);
        $query_inserir->bindValue('profissao',$profissao,PDO::PARAM_STR);
        $query_inserir->execute();

      	echo "< script>alert(Cadastrado com Sucesso)</script>";

	}catch (PDOexception $erro_cadastro){
		echo "erro ao  cadastrar".$erro_cadastro->getMessage;
	}


}

?>






