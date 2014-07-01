<?php require_once("pg_connect.php"); ?>
<?php require_once("header.php"); ?>
<?php require_once("menu.php"); ?>




 <?php

#UPDATE
		  if(isset($_POST['atualizar'])){
          $id   = (INT)$_GET['id'];
          $nome = $_POST['nome'];

          $pgUpdate = 'UPDATE categorias SET cate_nome=:nome   WHERE cate_id=:id';

             try {

            $update = $db->prepare($pgUpdate);
            $update->bindValue(':id',$id,PDO::PARAM_INT);
            $update->bindValue(':nome',$nome,PDO::PARAM_STR);
            $update->execute(); 

            echo "<script>alert('Categoria atualizada com Sucesso')</script>";
            header ("location: cateList.php");
             
           } catch (PDOException $e) {
            $e->getMessage();
             
           } 
        }

 ?>



 <?php 
 
  
           if (isset($_GET['action']) && $_GET['action'] == 'update') {
         
            $id =(int)$_GET['id'];

            $pgSelect = 'SELECT * FROM categorias where cate_id = :id'; 
                 
            try {
               
            $select=$db->prepare($pgSelect);
            $select->bindValue(':id',$id, PDO::PARAM_INT);
        

            $select->execute();

            } catch (PDOexception $e) {
              echo $e->getMessage();
               
              } 
        
           $result = $select->fetch(PDO::FETCH_OBJ);




?>


<div id="conteudo">

<div class="container"> 
        <div class="jumbotron">

    <h4 class="alert alert-success">Atualizar Categoria</h4>

           
            <form  class="form-horizontal"   action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Categoria</label>
                       <div class="col-sm-3">
                           <input name="nome"  type="text"  placeholder="Digite a nome" value="<?php echo $result->cate_nome;?>" required>

                       </div> 
                </div>

<div class="form-group">
                    <div class="col-sm-offset-2 col-sm-7">
                        <input type="submit" name="atualizar" value="Atualizar dados" class="btn btn-success"/>
                    </div>
                </div>
 
            </form>

     <?php } ?>
 

</div>

</div>
</div>
<?php require_once("footer.php"); ?>


