<?php

require_once "Crud.php";


class Aluno extends Crud{

    private $nome;
    private $telefone;
    private $email;
    protected $table = "aluno";

    public function getNome() {
        return $this->nome;
    }

    public function getTelefone(){
    	  return $this->telefone;
    }

    
    public function getEmail() {
        return $this->email;
    }

    public function getTable() {
        return $this->table;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setTelefone($telefone){
    	$this->telefone = $telefone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTable($table) {
        $this->table = $table;
    }

    
    public function insert() {

        $stmt = $this->db->prepare("Insert into $this->table (alun_nome,alun_telefone,alun_email) values(:nome,:telefone,:email)");
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":email", $this->email);

        $stmt->execute();
        echo '<script>window.location.replace("form_insertAluno.php")</script>;';
    }

    public function update($id) {
        $stmt = $this->db->prepare("Update $this->table set nome=:nome where id=$id");
        $stmt->bindParam(":nome", $this->nome);
        $stmt->execute();
        echo '<script>window.location.replace("../categorias.php")</script>;';
    }

}
