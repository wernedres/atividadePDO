<?php include_once '../header.php'; ?>
 <?php include_once '../menu.php'; ?>
<?php include_once '../pg_connect.php';?>

  <?php 

            $nome = strip_tags(trim($_POST['nome']));

            if(isset($_POST['enviar'])){         
            $pg_inserir = 'INSERT INTO professor (prof_nome) VALUES (:nome)';
            try{  
            $pg_query=$db->prepare($pg_inserir);
            $pg_query->bindValue(':nome',$nome,PDO::PARAM_STR);
            $pg_query->execute();

            echo "<script>alert('Professor BAITOLA cadastrado com sucesso')</script>";
            header("Location:../profList.php");

            }catch(PDOexception $e){
            echo $e->getMessage();

               }

 # code...
}

 ?>






<div id="conteudo">

<div class="container"> 
        <div class="jumbotron">

    <h4 class="alert alert-success">Cadastrar Professor</h4>
        
            <form  class="form-horizontal"   action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Professor</label>
                       <div class="col-sm-3">
                           <input name="nome"  type="text"  placeholder="Digite a nome" required>

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
<?php require_once("../footer.php"); 


