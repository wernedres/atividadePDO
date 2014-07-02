<?php 
 require_once("header.php");
 require_once("menu.php"); 
 include_once 'pg_connect.php';
 ?>

<div id="conteudo">
    <h4 class="alert alert-success">Professores cadastrados</h4>

       <table class="table table-striped">
            <thead>
              <tr class="success">                   
                 <th>Id</th>
                 <th>Nome</th>
                 <th>Editar</th>
                 <th>Excluir</th>
              </tr>
            </thead>   

  <?php 

         $pg_read = 'SELECT * FROM professor order by prof_nome';
         
        try{
         $read= $db->prepare($pg_read);
         $read->execute();
        }catch(PDOexception $e){
          echo $e->getMessage();
          }
        while ( $rs = $read->fetch(PDO::FETCH_OBJ) ) {
  ?>
      <tr>
      <td><?php echo $rs->prof_id ;?></td>
      <td><?php echo $rs->prof_nome;?></td> 
      <td><a href="profEdit.php?action=update&id=<?php   echo $rs->prof_id;?>" class="btn btn-info glyphicon glyphicon-list">Editar</a></td>
      <td><a href="profDelete.php?action=delete&id=<?php echo $rs->prof_id;?>" class="btn btn-danger  glyphicon glyphicon-trash" class="btn"  >Excluir</a></td>
      </tr>

      <?php } ?>

      </table>

      <a href="forms/formProfessor.php" class="btn btn-sm btn-success glyphicon glyphicon-ok"> Novo Professor</a>
       
</div>

<?php require_once("footer.php"); ?>
