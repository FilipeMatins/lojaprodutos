<?php

require_once __DIR__ . "/../config/Database.php";

class ProdutoModel {

    public $id;

    public string $nome;
    public string $descricao;

    public $id_categoria;
    public $preco;
     private $conn;
     private $tabela = "produtos";
    
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

    public function cadastrar($produtos){
        $query = "INSERT INTO $this->tabela (nome, descricao, id_categoria, preco) VALUES (:nome, :descricao, :id_categoria, :preco)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $produtos["nome"] );
        $stmt->bindParam(":descricao", $produtos["descricao"] );
        $stmt->bindParam(":id_categoria", $produtos["id_categoria"] );
        $stmt->bindParam(":preco", $produtos["preco"] );
        

        return $stmt->execute();
    }

    public function editar($produtos){
        $query = "UPDATE $this->tabela SET nome = :nome, descricao = :descricao, id_categoria = :id_categoria, preco = :preco WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $produtos["nome"] );
        $stmt->bindParam(":descricao", $produtos["descricao"] );
        $stmt->bindParam(":id_categoria", $produtos["id_categoria"] );
        $stmt->bindParam(":preco", $produtos["preco"] );
        $stmt->bindParam(":id", $produtos["id"] );
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
