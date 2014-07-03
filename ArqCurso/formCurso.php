
<?php include_once '../header.php'; ?>
 <?php include_once '../menu.php'; ?>
<?php include_once '../pg_connect.php';?>


<?php 

    $curso      = strip_tags(trim($_POST['curso']));
    $duracao    = strip_tags(trim($_POST['duracao']));
    $categoria  = strip_tags(trim($_POST['categorias']));
    $professor  = strip_tags(trim($_POST['mestre']));
    $quantidade = strip_tags(trim($_POST['qtdAluno']));

    if(isset($_POST['enviar'])){
      
    $pg_inserir = 'INSERT INTO curso (curs_nome,curs_duracao,categorias,professor,curs_qtdaluno)';
    $pg_inserir.= 'values (:curso, :duracao, :categoria, :professor, :quantidade)';
    
    try {
     $pg_query=$db->prepare($pg_inserir);
     $pg_query->bindValue(':curso',$curso,PDO::PARAM_STR);
     $pg_query->bindValue(':duracao',$duracao,PDO::PARAM_STR);
     $pg_query->bindValue(':categoria',$categoria,PDO::PARAM_INT);
     $pg_query->bindValue(':professor',$professor,PDO::PARAM_INT);
     $pg_query->bindValue(':quantidade',$quantidade,PDO::PARAM_STR);
     $pg_query->execute();

    header("Location:cursList.php");


    } catch (PDOException $e) {
    echo $e->getMessage;  
    }

  }



 ?>



<div id="conteudo">
   <div class="container"> 
      <div class="jumbotron">

<h4 class="alert alert-success">Cadastrar Curso</h4>

     <form  class="form-horizontal"   action="" method="post" enctype="multipart/form-data">

       <div class="form-group">
         <label class="col-sm-2 control-label">Curso</label>
            <div class="col-sm-3">
             <input name="curso"  type="text"  placeholder="Digite a nome" required>
            </div> 
       </div>


      <div class="form-group">
        <label class="col-sm-2 control-label">Duração</label>
         <div class="col-sm-3">
             <input name="duracao"  type="text"  placeholder="Digite a Duração " required>
          </div>
      </div>



  <div class="form-group">
      <label class="col-sm-2 control-label">Categoria</label>
      <div class="col-sm-1">
          <select name="categorias"  required="true">
              <option>Selecione sua categoria</option>
    
                <?php
                    $consulta = ("SELECT * from categorias order by cate_nome;");

                    $exibi= $db->prepare($consulta);
                    $exibi->execute();
                    while ($result = $exibi->fetch(PDO::FETCH_OBJ)): 
                ?>
        
                  <option value="<?php echo $result->cate_id; ?>"><?php echo $result->cate_nome; ?></option>
              <?php endwhile; ?>
          </select>
      </div>
  </div>

  <div class="form-group">
      <label class="col-sm-2 control-label">Professor</label>
      <div class="col-sm-1">
          <select name="mestre"  required="true">
              <option>Selecione um professor</option>
   
          <?php
                    $consulta = ("SELECT * from professor order by prof_nome;");

                    $exibi= $db->prepare($consulta);
                    $exibi->execute();
                    while ($result = $exibi->fetch(PDO::FETCH_OBJ)): 
                ?>
                <option value="<?php echo $result->prof_id; ?>"><?php echo $result->prof_nome; ?> </option>
           <?php endwhile; ?>
          </select>
      </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Qtd max de Aluno</label>
         <div class="col-sm-3">
             <input name="qtdAluno"  type="text" value="30"  placeholder="Digite a Qtd max de aluno " required>

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