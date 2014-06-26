<?php

include 'header.php';
include_once 'menu.php';
?>
<div id="conteudo">
    <div class="container">
        <div class="jumbotron">
            <form action="" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Aluno</label>
                    <div class="col-sm-5">
                        <input  lang=”br” required="true" type="text" x-webkit-speech  class="form-control" name="nome" placeholder="Insira o nome do Aluno"  required="true" height="50" >
                    </div><br/><br/>

                     <div class="form-group">
                    <label class="col-sm-2 control-label">Telefone</label>
                    <div class="col-sm-5">
                        <input  lang=”br” required="true" type="text" x-webkit-speech  class="form-control" name="telefone" placeholder="Insira o telefone"  required="true" height="50" >
                    </div><br/><br/>


                    <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-5">
                        <input  lang=”br” required="true" type="text" x-webkit-speech  class="form-control" name="email" placeholder="Insira o seu Email"  required="true" height="50" >
                    </div><br/><br/><br/>
                    <input type="submit" class="btn btn-success" name="enviar" value="Cadastrar Aluno"/>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once 'Aluno.php';
require_once 'pg_connect.php';

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

if ($nome && $telefone  && $email ) {
    $aluno= new Aluno($db);
    $aluno->setNome($nome);
    $aluno->setTelefone($telefone);
    $aluno->setEmail($email);
    $aluno->insert();
}

include_once "footer.php";



