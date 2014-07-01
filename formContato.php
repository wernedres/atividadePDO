
<?php include_once 'header.php'; ?>
 <?php include_once 'menu.php'; ?>
<?php include_once 'pg_connect.php';?>


  <?php 

            $nome      = strip_tags (trim($_POST['nome']));
            $telefone  = strip_tags (trim($_POST['telefone']));
            $email     = strip_tags (trim($_POST['email']));
            $endereco  = strip_tags (trim($_POST['endereco']));
            $numero    = strip_tags (trim($_POST['numero']));
            $bairro    = strip_tags (trim($_POST['bairro']));
            $profissao = strip_tags (trim($_POST['profissao']));

            if(isset($_POST['enviar'])){         
            $pg_inserir = 'INSERT INTO contatos(cont_nome,cont_telefone,cont_email,cont_endereco,cont_numero,cont_bairro,cont_profissao)';
            $pg_inserir .= 'values (:nome,:telefone,:email, :endereco, :numero, :bairro, :profissao)';

 

            try{  
            $pg_query=$db->prepare($pg_inserir);
            $pg_query->bindValue(':nome',$nome,PDO::PARAM_STR);
            $pg_query->bindValue(':telefone',$telefone,PDO::PARAM_STR);
            $pg_query->bindValue(':email',$email,PDO::PARAM_STR);
            $pg_query->bindValue(':endereco',$endereco,PDO::PARAM_STR);
            $pg_query->bindValue(':numero',$numero,PDO::PARAM_STR);
            $pg_query->bindValue(':bairro',$bairro,PDO::PARAM_STR);
            $pg_query->bindValue(':profissao',$profissao,PDO::PARAM_STR);
            $pg_query->execute();

      }catch(PDOexception $e){
        echo $e->getMessage();

         }

 # code...
}

 ?>









<div class="container"> 
        <div class="jumbotron">

    <h4 class="alert alert-success">Cadastrar jkhjhj Contato</h4>
            <hr/><br/>


            <form   class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Nome</label>
                       <div class="col-sm-4">
                           <input name="nome"  type="text"  placeholder="Digite a nome" required>

                       </div> 
                </div>

    <div class="form-group">
                <label class="col-sm-2 control-label">Telefone</label>
                    <div class="col-sm-3">
                        <input name="telefone" type="text"  value="" placeholder="Digite a telefone" required>
                     </div>
            </div>





            <div class="form-group">
              <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-3">
                       <input name="email" type="text"  placeholder="Digite o email"  onBlur="ValidaEmail();" required>
                    </div>
             </div>


              <div class="form-group">
                  <label class="col-sm-2 control-label">Endereço</label>
                       <div class="col-sm-3">
                           <input name="endereco"  type="text"  placeholder="Digite o endereço " required>

                        </div>
                </div>


            <div class="form-group">
                <label class="col-sm-2 control-label">Numero</label>
                    <div class="col-sm-3">
                        <input name="numero" type="text"  value="" placeholder="Digite o endereço" required>
                     </div>
            </div>


            <div class="form-group">
                <label class="col-sm-2 control-label">Bairro</label>
                    <div class="col-sm-3">
                        <input name="bairro" type="text"  value="" placeholder="Digite o endereço" required>
                     </div>
            </div>



                             <div class="form-group">
                  <label class="col-sm-2 control-label">Profissao</label>
                       <div class="col-sm-3">
                           <input name="profissao"  type="text"  placeholder="Digite a profissao " required>

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
</div>
<?php require_once("footer.php"); 






