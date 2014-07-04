
<?php include_once '../header.php'; ?>
<?php include_once '../menu.php'; ?>
<?php include_once '../pg_connect.php'; ?>



<div id="conteudo">
    <h4 class="alert alert-success">Contatos cadastrados</h4>

    <table>

        <table class="table table-striped">


            <thead>
                <tr>



                    <th>ID</th>
                    <th>NOME</th>
                    <th>EMAIL</th>

            <?php if ($_SESSION['leitura'] == 't'): ?>
                <th>Editar</th>
            <?php endif; ?>
                      <?php if ($_SESSION['escrita'] == 't'): ?>
                <th>Excluir</th>
            <?php else: ?>
                <p>Você não tem permissão, seu inseto</p>
            <?php endif; ?>

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
                        <?php if ($_SESSION['leitura'] == 't'): ?>
                    <td><a href="userEdit.php?action=update&id=<?php echo $rs->user_id; ?>" class="btn btn-info glyphicon glyphicon-list">Editar</a></td>
                    <?php endif; ?>
            <?php if ($_SESSION['escrita'] == 't'): ?> 

                   
                 <td><a href="userDelete.php?action=delete&id=<?php echo $rs->user_id; ?>" onclick="return confirm('Excluir Usuario?')" class="btn btn-danger  glyphicon glyphicon-trash" class="btn"  >Excluir</a></td>
               <?php endif ; ?>
                </tr>

            <?php } ?>


             <?php if ($_SESSION['permissao'] == 2): ?>
                <p>Voce tem permissao nivel 2, permissao maximo, root</p>
                <?php else: ?>
                <p>Sua permissao é abaixo do nivel permitido</p>
                <?php endif; ?>


        </table>

        <?php if ($_SESSION['permissao'] == 2): ?>
        <a href="formUSer.php" class="btn btn-sm btn-success glyphicon glyphicon-ok"> Novo Usuario</a>
       <?php endif; ?>
</div>
<?php include_once '../footer.php'; ?>