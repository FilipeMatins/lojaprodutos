<?php

require_once __DIR__ . "/../config/Database.php";

class CategoriaModel {

    
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
}