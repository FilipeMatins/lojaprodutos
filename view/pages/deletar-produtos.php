<?php

require_once __DIR__ . '/../../model/ProdutosModel.php';

if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $id = $_POST['id'];

    if(!empty($id)){

        $produtoModel = new ProdutoModel();
        $sucesso = $produtoModel->deletar($id);
        
        if($sucesso){
            return header("Location: produtos.php?mensagem=sucesso");
        } else {
        return header("Location: produtos.php?mensagem=erro");
        }
    }
}

    return header("Location: produtos.php");
?>