<?php

require_once __DIR__ . '/../../model/UsuarioModel.php';

if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $id = $_POST['id'];

    if(!empty($id)){

        $usuarioModel = new UsuarioModel();
        $sucesso = $usuarioModel->deletar($id);
        
        if($sucesso){
            return header("Location: usuarios.php?mensagem=sucesso");
        } else {
        return header("Location: usuarios.php?mensagem=erro");
        }
    }
}

    return header("Location: usuarios.php");
?>