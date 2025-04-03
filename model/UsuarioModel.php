<?php

require_once __DIR__ . "/../config/Database.php";

class UsuarioModel {

    public $id;

    public string $nome;
    public string $email;

    public $data_nascimento;
    public $cpf;
    public $telefone;
     private $conn;
     private $tabela = "usuarios";
    
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

    public function cadastrar($usuarios){
        $query = "INSERT INTO $this->tabela (nome, email, data_nascimento, cpf, telefone) VALUES (:nome, :email, :data_nascimento, :cpf, :telefone)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $usuarios["nome"] );
        $stmt->bindParam(":email", $usuarios["email"] );
        $stmt->bindParam(":data_nascimento", $usuarios["data_nascimento"] );
        $stmt->bindParam(":cpf", $usuarios["cpf"] );
        $stmt->bindParam(":telefone", $usuarios["telefone"] );
        

        return $stmt->execute();
    }

    public function editar($usuarios){
        $query = "UPDATE $this->tabela SET nome = :nome, email = :email, data_nascimento = :data_nascimento, cpf = :cpf, telefone = :telefone WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $usuarios["nome"] );
        $stmt->bindParam(":email", $usuarios["email"] );
        $stmt->bindParam(":data_nascimento", $usuarios["data_nascimento"] );
        $stmt->bindParam(":cpf", $usuarios["cpf"] );
        $stmt->bindParam(":telefone", $usuarios["telefone"] );
        $stmt->bindParam(":id", $usuarios["id"] );
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
