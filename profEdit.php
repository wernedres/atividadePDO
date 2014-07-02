<?php require_once("pg_connect.php"); ?>
<?php require_once("header.php"); ?>
<?php require_once("menu.php"); ?>



<?php
#UPDATE
if (isset($_POST['atualizar'])) {
    $id = (INT) $_GET['id'];
    $nome = $_POST['nome'];

    $pgUpdate = 'UPDATE professor SET prof_nome=:nome   WHERE prof_id=:id';

    try {

        $update = $db->prepare($pgUpdate);
        $update->bindValue(':id', $id, PDO::PARAM_INT);
        $update->bindValue(':nome', $nome, PDO::PARAM_STR);
        $update->execute();

        header("location: profList.php");
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
?>


<?php
if (isset($_GET['action']) && $_GET['action'] == 'update') {

    $id = (int) $_GET['id'];
    $pgSelect = 'SELECT * FROM professor where prof_id = :id';

    try {

        $select = $db->prepare($pgSelect);
        $select->bindValue(':id', $id, PDO::PARAM_INT);
        $select->execute();
    } catch (PDOexception $e) {
        echo $e->getMessage();
    }

    $result = $select->fetch(PDO::FETCH_OBJ);
    ?>


    <div id="conteudo">
        <div class="container"> 
            <div class="jumbotron">

                <h4 class="alert alert-success">Cadastrar Professor</h4>

                <form  class="form-horizontal"   action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Professor</label>
                        <div class="col-sm-3">
                            <input name="nome"  type="text" value="<?php echo $result->prof_nome; ?>" placeholder="Digite a nome" required>
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


