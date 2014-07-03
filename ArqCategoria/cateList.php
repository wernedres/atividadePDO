<?php require_once("../header.php"); ?>
<?php require_once("../menu.php"); ?>
<?php include_once '../pg_connect.php'; ?>


<div id="conteudo">
    <h4 class="alert alert-success">Categorias cadastradas</h4>

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
        $pg_read = 'SELECT * FROM categorias order by cate_nome';

        try {
            $read = $db->prepare($pg_read);
            $read->execute();
        } catch (PDOexception $e) {
            echo $e->getMessage();
        }
        while ($rs = $read->fetch(PDO::FETCH_OBJ)) {
            ?>

            </tr>

            <tr>
                <td><?php echo $rs->cate_id; ?></td>
                <td><?php echo $rs->cate_nome; ?></td>
                <td><a href="cateEdit.php?action=update&id=<?php echo $rs->cate_id; ?>" class="btn btn-info glyphicon glyphicon-list">Editar</a></td>
                <td><a href="cateDelete.php?action=delete&id=<?php echo $rs->cate_id; ?>" class="btn btn-danger  glyphicon glyphicon-trash" class="btn"  >Excluir</a></td>
            </tr>

        <?php } ?>

    </table> 

    <a href="formCategoria.php" class="btn btn-sm btn-success glyphicon glyphicon-ok"> Nova categoria</a>


</div>

<?php require_once("../footer.php"); ?>
