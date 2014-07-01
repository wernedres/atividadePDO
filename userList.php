
<?php include_once 'header.php'; ?>
<?php include_once 'menu.php' ;?>
<?php include_once 'pg_connect.php'; ?>




<div id="conteudo">
    <h4 class="alert alert-success">Contatos cadastrados</h4>

    <table>

      <table class="table table-striped">

				
			<thead>
			<tr>


			<th>ID</th>
			<th>NOME</th>
			<th>EMAIL</th>
		
			<th>EDITAR</th>
			<th>EXCLUIR</th>


			</tr>
            </thead>

			<?php 
			$pg_read = 'SELECT * FROM usuarios order by user_nome';
            try{
		     $read= $db->prepare($pg_read);
		     $read->execute();
		    }catch(PDOexception $e){
		    	echo $e->getMessage();
		    }
           	while ( $rs = $read->fetch(PDO::FETCH_OBJ) ) {
            ?>


			<tr>
				
			<td><?php echo $rs->user_id ;?></td>
			<td><?php echo $rs->user_nome;?></td>
			<td><?php echo $rs->user_email ;?></td>
			
	        <td><a href="formUser.php" class="btn" ><i class="icon-pencil" ></i></a></td>
            <td><a href="userList.php?action=delete&id=<?php echo $rs->id;  ?>" class='btn btn-danger  glyphicon glyphicon-trash' onclick="return confirm('Deseja reamente Excluir?');"><i class="icon-remove"></i></a></td>
            </tr>

			<?php } ?>


			</table>
<a href="formUSer.php" class="btn btn-sm btn-success glyphicon glyphicon-ok"> Novo Usuario</a>
       
</div>
<?php include_once 'footer.php'; ?>