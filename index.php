<?php
    require_once __DIR__ . '/../../model/CategoriaModel2.php';

    $objUser = new Categoria();


    if(isset($_POST['cad-categoria'])){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="POST">
        <input type="text" placeholder="nome">
        <input type="text" placeholder="desc">
        <button name="cad-categoria">Cadastrar Categoria</button>
    </form>
</body>
</html>