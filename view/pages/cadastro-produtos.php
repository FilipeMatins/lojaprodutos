<?php


require_once __DIR__ . '/../../model/ProdutosModel.php';

// Inicializa o modelo
$produtoModel = new ProdutoModel();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $id_categoria = $_POST['id_categoria'];
    $preco = $_POST['preco'];
    
    
    if (!empty($_POST['id'])) {

        $id = $_POST['id'];
        $sucesso = $produtoModel->editar([
            'id' => $id,
            'nome' => $nome,
            'descricao' => $descricao,
            'id_categoria' => $id_categoria,
            'preco' => $preco
            
        ]);
        if($sucesso){
            return header("Location: produtos.php?mensagem=sucesso");
        } else {
        return header("Location: produtos.php?mensagem=erro");
        }
        
        
    } else {
        
        $sucesso = $produtoModel->cadastrar([
            'nome' => $nome,
            'descricao' => $descricao,
            'id_categoria' => $id_categoria,
            'preco' => $preco
        ]);
        
        if($sucesso){
            return header("Location: produtos.php?mensagem=sucesso");
        } else {
        return header("Location: produtos.php?mensagem=erro");
        }
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
    
    if (!empty($_GET['id'])) {
        $cadastro = $produtoModel->buscarPorId($_GET['id']);
    } else {
        $cadastro = null; 
    }
}



?>

<?php require_once __DIR__ . '\..\components\head.php'; ?>



<body class="corpo-visualizar-categoria">
    <?php require_once __DIR__ . '\..\components\navbar.php'; ?>

    <?php require_once __DIR__ . '\..\components\sidebar.php'; ?>

    
    <section class="container-cadastro-editar">
    <form action="cadastro-produtos.php" method="POST">
        <?php if (isset($cadastro->id)): ?>
            <input type="hidden" name="id" value="<?php echo $cadastro->id; ?>">
        <?php endif; ?>

        <div class="formulario">
            <label for="nome">Nome:</label>
            
            <input type="text" name="nome" value="<?php echo isset($cadastro->nome) ? $cadastro->nome : ''; ?>" required>
        </div>

        <div class="formulario">
            <label for="descricao">Descrição:</label>
           
            <input type="text" name="descricao" value="<?php echo isset($cadastro->descricao) ? $cadastro->descricao : ''; ?>" required>
        </div>
        <div class="formulario">
            <label for="id_categoria">Categoria:</label>
           
            <input type="text" name="id_categoria" value="<?php echo isset($cadastro->id_categoria) ? $cadastro->id_categoria : ''; ?>" required>
        </div>
        <div class="formulario">
            <label for="preco">Preço:</label>
           
            <input type="text" name="preco" value="<?php echo isset($cadastro->preco) ? $cadastro->preco : ''; ?>" required>
        </div>

        <button type="submit">Salvar</button>
    </form>
</section>
    
</body>
</html>