
<?php include_once '../header.php'; ?>
 <?php include_once '../menu.php'; ?>
<?php include_once '../pg_connect.php';?>



<?php
      $nome        = strip_tags (trim($_POST['nome']));
      $email       = strip_tags (trim($_POST['email']));
      $senha       = strip_tags (md5($_POST['senha']));



       if(isset($_POST['enviar'])){
       $pg_inserir = 'INSERT INTO usuarios(user_nome,user_email,user_senha)';
       $pg_inserir .= 'values (:nome,:email, :senha)';

 
       try{
       $query_inserir = $db->prepare($pg_inserir);
       $query_inserir->bindValue(':nome',  $nome,PDO::PARAM_STR);
       $query_inserir->bindValue(':email', $email,PDO::PARAM_STR);
       $query_inserir->bindValue(':senha', $senha,PDO::PARAM_STR);
       $query_inserir->execute();

      echo "<script>alert('Usuario cadastrado com sucesso')</script>";
       echo '<script>window.location.replace("../userList.php")</script>;';

    }catch(PDOexception $erro_cadastro){
    echo 'error ao cadastrar'.$erro_cadastro->getMessage;
   }
}

?>


<div class="container"> 
        <div class="jumbotron">

    <h4 class="alert alert-success">Cadastrar Usuario</h4>
            <hr/><br/>


            <form   class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Nome</label>
                       <div class="col-sm-4">
                           <input name="nome"  type="text"  placeholder="Digite a nome" required>

                       </div> 
                </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-3">
                       <input name="email" type="text"  placeholder="Digite o email"  onBlur="ValidaEmail();" required>
                    </div>
             </div>


           <div class="form-group">
                <label class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-3">
                        <input name="senha" type="password"  value="" placeholder="Digite a telefone" required>
                     </div>
            </div>
    

      <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-7">
                        <input type="submit" name="enviar" value="Cadastrar" class="btn btn-success"/>
                    </div>
                </div>
        
      
    </form>


        </div>
    </div>



<?php include_once '../footer.php'; ?>
