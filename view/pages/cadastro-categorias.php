<?php


require_once __DIR__ . '/../../model/CategoriaModel.php';

// Inicializa o modelo
$categoriaModel = new CategoriaModel();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    
    if (!empty($_POST['id'])) {

        $id = $_POST['id'];
        $sucesso = $categoriaModel->editar([
            'id' => $id,
            'nome' => $nome,
            'descricao' => $descricao
        ]);
        if($sucesso){
            return header("Location: categorias.php?mensagem=sucesso");
        } else {
        return header("Location: categorias.php?mensagem=erro");
        }
        
    } else {
        
        $sucesso = $categoriaModel->cadastrar([
            'nome' => $nome,
            'descricao' => $descricao
        ]);
        
        if($sucesso){
            return header("Location: categorias.php?mensagem=sucesso");
        } else {
        return header("Location: categorias.php?mensagem=erro");
        }
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
    
    if (!empty($_GET['id'])) {
        $cadastro = $categoriaModel->buscarPorId($_GET['id']);
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
    <form action="cadastro-categorias.php" method="POST">
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

        <button type="submit">Salvar</button>
    </form>
</section>
    
</body>
</html>