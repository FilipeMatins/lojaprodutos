<?php

require_once __DIR__ . "/../config/Database.php";

class CategoriaModel {

    public $id;

    public string $nome;
    public string $descricao;
     private $conn;
     private $tabela2 = "categoria";
    
     public function __construct(){
        $db = new Database();
        $this->conn = $db->conectar();
    }
}

class ProdutoModel {

    public $id;

    public string $nome;
    public string $descricao;
    public $categoria_nome;
    public $id_categoria;
    public $preco;
     private $conn;
     private $tabela = "produtos";

     private $tabela2 = "categoria";
    
     public function __construct(){
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function listar() {
        $query = "SELECT p.id, p.nome, p.descricao, c.nome as categoria_nome, p.preco FROM $this->tabela as p INNER JOIN $this->tabela2 as c on c.id = p.id_categoria";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchALL();
    }

    public function buscarPorId($id) {
        $query = "SELECT p.id, p.nome, p.descricao, c.nome as categoria_nome, p.preco FROM $this->tabela as p INNER JOIN $this->tabela2 as c on c.id = p.id_categoria where p.id = :id";

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
