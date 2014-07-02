<?php 
require_once("header.php"); 
require_once("menu.php"); 
require_once ("pg_connect.php"); 
?>

<div id="conteudo">
    <h4 class="alert alert-success"> Lista de Cursos disponíveis</h4>
 
      <table class="table table-striped">
           <thead>
                 <tr class="success">
                    <th>ID</th>
                    <th>Curso</th>
                    <th>Duração</th>
                    <th>Categoria</th>
                    <th>Professor</th>
                    <th>Qtd Max de alunos</th>
                     <th>Editar</th>
                     <th>Excluir</th>
                </tr>
          </thead>   

          <?php 

          $pg_read = 'SELECT * FROM listcurso';
        
          try{

           $read= $db->prepare($pg_read);
           $read->execute();
           
          }catch(PDOexception $e){
          echo $e->getMessage();
            }
          while ( $rs = $read->fetch(PDO::FETCH_OBJ) ) {
              
         ?>    
            <tr>
            <td><?php echo $rs->curs_id; ?></td>
            <td><?php echo $rs->curs_nome; ?></td>
            <td><?php echo $rs->curs_duracao; ?></td>
            <td><?php echo $rs->cate_nome; ?></td>
            <td><?php echo $rs->prof_nome; ?></td>
            <td><?php echo $rs->curs_qtdaluno; ?></td>   
            <td><a href="cursEdit.php?action=update&id=<?php   echo $rs->curs_id;?>" class="btn btn-info glyphicon glyphicon-list">Editar</a></td>
            <td><a href="cursDelete.php?action=delete&id=<?php echo $rs->curs_id;?>" class="btn btn-danger  glyphicon glyphicon-trash" class="btn"  >Excluir</a></td>     
           </tr>

      <?php } ?>
        
 
        </table>
          <a href="forms/formCurso.php" class="btn btn-sm btn-success glyphicon glyphicon-ok"> Novo Curso</a>
</div>
  
<?php require_once("footer.php"); ?>
 