<?php

abstract class Crud {

    protected $db;
    protected $page;
    protected $table;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    abstract public function insert();

    abstract public function update($id);

    public function delete($id) {
        $stmt = $this->db->prepare("delete from $this->table where id=$id");
        if($stmt->execute()){
        $stmt->fetch();
        header("location: $this->page");
        }  else {
    echo '<script> alert("Remoção viola restrição de chave estrangeira")</script>;';
        echo '<script>window.location.replace("categorias.php")</script>;';
      
        }
        
    }

}
