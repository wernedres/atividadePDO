<?php require_once("pg_connect.php"); ?>
<?php require_once("header.php"); ?>
<?php require_once("menu.php"); ?>


<?php
#UPDATE
if (isset($_POST['atualizar'])) {
    $id = (INT) $_GET['id'];
    $curso = $_POST['curso'];
    $duracao = $_POST['duracao'];
    $professor = $_POST['mestre'];
    $categoria = $_POST['categorias'];
    $quantidade = $_POST['qtdAluno'];


    $pgUpdate = 'UPDATE curso SET curs_nome=:curso, curs_duracao=:duracao, categorias=:categoria, professor=:professor, curs_qtdaluno=:quantidade WHERE curs_id=:id';

    try {

        $update = $db->prepare($pgUpdate);
        $update->bindValue(':id', $id, PDO::PARAM_INT);
        $update->bindValue(':curso', $curso, PDO::PARAM_STR);
        $update->bindValue(':duracao', $duracao, PDO::PARAM_STR);
        $update->bindValue(':categoria', $categoria, PDO::PARAM_INT);
        $update->bindValue(':professor', $professor, PDO::PARAM_INT);
        $update->bindValue(':quantidade', $quantidade, PDO::PARAM_STR);
        $update->execute();


        header("location: cursList.php");
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
?>



<?php
if (isset($_GET['action']) && $_GET['action'] == 'update') {

    $id = (int) $_GET['id'];

    $pgSelect = 'SELECT * FROM curso where curs_id = :id';

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

                <h4 class="alert alert-success">Atualizar dados de Curso</h4>

                <form  class="form-horizontal"   action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Curso</label>
                        <div class="col-sm-3">
                            <input name="curso"  type="text" value="<?php echo $result->curs_nome; ?>" placeholder="Digite a nome" required>
                        </div> 
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">Duração</label>
                        <div class="col-sm-3">
                            <input name="duracao"  type="text"  value="<?php echo $result->curs_duracao; ?>" placeholder="Digite a Duração " required>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-2 control-label">Categoria</label>
                        <div class="col-sm-1">
                            <select name="categorias"  required="true">
                                <option>Selecione sua categoria</option>

                                <?php
                                $consulta = ("SELECT * from categorias order by cate_nome;");

                                $exibi = $db->prepare($consulta);
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

                                $exibi = $db->prepare($consulta);
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
                            <input name="qtdAluno"  type="text" value="30" value="<?php echo $result->curs_qtdaluno; ?>" placeholder="Digite a Qtd max de aluno " required>

                        </div>
                    </div>




                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-7">
                            <input type="submit" name="atualizar" value="Atualizar Dados" class="btn btn-success"/>
                        </div>
                    </div>

                </form>
            <?php } ?>
        </div>

    </div>
</div>



<?php
require_once("footer.php");
