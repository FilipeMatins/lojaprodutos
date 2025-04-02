<?php

require_once __DIR__ . "/../config/Database.php";

class CategoriaModel {

    public $id;

    public string $nome;
    public string $descricao;
     private $conn;
     private $tabela = "categoria";
    
     public function __construct(){
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function listar() {
        $query = "SELECT * FROM $this->tabela";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchALL();
    }

    public function buscarPorId($id) {
        $query = "SELECT * FROM $this->tabela where id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);

        return $stmt->fetch();
    }

    public function cadastrar($categoria){
        $query = "INSERT INTO $this->tabela (nome, descricao) VALUES (:nome, :descricao)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $categoria["nome"] );
        $stmt->bindParam(":descricao", $categoria["descricao"] );
        ;

        return $stmt->execute();
    }

    public function editar($categoria){
        $query = "UPDATE $this->tabela SET nome = :nome, descricao = :descricao WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $categoria["nome"] );
        $stmt->bindParam(":descricao", $categoria["descricao"] );
        $stmt->bindParam(":id", $categoria["id"] );
        $stmt->execute();

        return $stmt->fetch();
    }
    public function deletar( $id ){
        $query = "DELETE FROM $this->tabela where id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount() >0;
}
}
