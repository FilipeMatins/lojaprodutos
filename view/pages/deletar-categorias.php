<?php

require_once __DIR__ . '/../../model/CategoriaModel.php';

if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $id = $_POST['id'];

    if(!empty($id)){

        $categoriaModel = new CategoriaModel();
        $sucesso = $categoriaModel->deletar($id);
        
        if($sucesso){
            return header("Location: categorias.php?mensagem=sucesso");
        } else {
        return header("Location: categorias.php?mensagem=erro");
        }
    }
}

    return header("Location: categorias.php");
?>