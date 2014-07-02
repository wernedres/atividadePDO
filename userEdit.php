<?php require_once("pg_connect.php"); ?>
<?php require_once("header.php"); ?>
<?php require_once("menu.php"); ?>




<?php
#UPDATE
if (isset($_POST['atualizar'])) {
    $id = (INT) $_GET['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = (md5($_POST['senha']));

    $pgUpdate = 'UPDATE usuarios SET user_nome=:nome , user_senha=:senha , user_email=:email WHERE user_id=:id';

    try {

        $update = $db->prepare($pgUpdate);
        $update->bindValue(':id', $id, PDO::PARAM_INT);
        $update->bindValue(':nome', $nome, PDO::PARAM_STR);
        $update->bindValue(':senha', $senha, PDO::PARAM_STR);
        $update->bindValue(':email', $email, PDO::PARAM_STR);
        $update->execute();

        echo "<script>alert('Usuario atualizada com Sucesso')</script>";
        header("location: userList.php");
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
?>

<?php
#READ
if (isset($_GET['action']) && $_GET['action'] == 'update') {

    $id = (int) $_GET['id'];

    $pgSelect = 'SELECT * FROM usuarios where user_id = :id';

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
                <form action="" method="post">
                    <div class="form-group">
                        <label class="col-sm-1 control-label">Nome</label>
                        <div class="col-sm-5">
                            <input  lang=”br” required="true" type="text" x-webkit-speech  class="form-control" name="nome" value="<?php echo $result->user_nome; ?>" placeholder="Insira o nome do Aluno"  required="true" height="50" >
                        </div><br/><br/>

                        <div class="form-group">
                            <label class="col-sm-1 control-label">Senha</label>
                            <div class="col-sm-5">
                                <input  lang=”br” required="true" type="password" x-webkit-speech  class="form-control" name="senha" value="<?php echo $result->user_senha; ?>" placeholder="Insira a senha"  required="true" height="50" >
                            </div><br/><br/>


                            <div class="form-group">
                                <label class="col-sm-1 control-label">Email</label>
                                <div class="col-sm-5">
                                    <input  lang=”br” required="true" type="text" x-webkit-speech  class="form-control" name="email" value="<?php echo $result->user_email; ?>" placeholder="Insira o seu Email"  required="true" height="50" >
                                </div><br/><br/><br/>
                                <input type="submit" class="btn btn-success" name="atualizar" value="Atualizar dados de  Usuario"/>
                            </div>
                            </form>


<?php } ?>

                    </div>
                </div>
        </div>




<?php include_once 'footer.php'; ?>