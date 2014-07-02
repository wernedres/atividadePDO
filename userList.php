
<?php include_once 'header.php'; ?>
<?php include_once 'menu.php'; ?>
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
            try {
                $read = $db->prepare($pg_read);
                $read->execute();
            } catch (PDOexception $e) {
                echo $e->getMessage();
            }
            while ($rs = $read->fetch(PDO::FETCH_OBJ)) {
                ?>


                <tr>
                    <td><?php echo $rs->user_id; ?></td>
                    <td><?php echo $rs->user_nome; ?></td>
                    <td><?php echo $rs->user_email; ?></td>
                    <td><a href="userEdit.php?action=update&id=<?php echo $rs->user_id; ?>" class="btn btn-info glyphicon glyphicon-list">Editar</a></td>
                    <td><a href="userDelete.php?action=delete&id=<?php echo $rs->user_id; ?>" onclick="return confirm('Excluir Usuario?')" class="btn btn-danger  glyphicon glyphicon-trash" class="btn"  >Excluir</a></td>
                </tr>

            <?php } ?>


        </table>
        <a href="forms/formUSer.php" class="btn btn-sm btn-success glyphicon glyphicon-ok"> Novo Usuario</a>

</div>
<?php include_once '../footer.php'; ?>