<?php


require_once __DIR__ . '/../../model/UsuarioModel.php';

// Inicializa o modelo
$usuarioModel = new UsuarioModel();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    
    if (!empty($_POST['id'])) {

        $id = $_POST['id'];
        $sucesso = $usuarioModel->editar([
            'id' => $id,
            'nome' => $nome,
            'email' => $email,
            'data_nascimento' => $data_nascimento,
            'cpf' => $cpf,
            'telefone' => $telefone
        ]);
        if($sucesso){
            return header("Location: usuarios.php?mensagem=sucesso");
        } else {
        return header("Location: usuarios.php?mensagem=erro");
        }
        
        
    } else {
        
        $sucesso = $usuarioModel->cadastrar([
            'nome' => $nome,
            'email' => $email,
            'data_nascimento' => $data_nascimento,
            'cpf' => $cpf,
            'telefone' => $telefone
        ]);
        
        if($sucesso){
            return header("Location: usuarios.php?mensagem=sucesso");
        } else {
        return header("Location: usuarios.php?mensagem=erro");
        }
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
    
    if (!empty($_GET['id'])) {
        $cadastro = $usuarioModel->buscarPorId($_GET['id']);
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
    <form action="cadastro-usuarios.php" method="POST">
        <?php if (isset($cadastro->id)): ?>
            <input type="hidden" name="id" value="<?php echo $cadastro->id; ?>">
        <?php endif; ?>

        <div class="formulario">
            <label for="nome">Nome:</label>
            
            <input type="text" name="nome" value="<?php echo isset($cadastro->nome) ? $cadastro->nome : ''; ?>" required>
        </div>

        <div class="formulario">
            <label for="email">Email:</label>
           
            <input type="text" name="email" value="<?php echo isset($cadastro->email) ? $cadastro->email : ''; ?>" required>
        </div>
        <div class="formulario">
            <label for="data_nascimento">Data Nascimento:</label>
           
            <input type="text" name="data_nascimento" value="<?php echo isset($cadastro->data_nascimento) ? $cadastro->data_nascimento : ''; ?>" required>
        </div>
        <div class="formulario">
            <label for="cpf">CPF:</label>
           
            <input type="text" name="cpf" value="<?php echo isset($cadastro->cpf) ? $cadastro->cpf : ''; ?>" required>
        </div>
        <div class="formulario">
            <label for="telefone">Telefone:</label>
           
            <input type="text" name="telefone" value="<?php echo isset($cadastro->telefone) ? $cadastro->telefone : ''; ?>" required>
        </div>

        <button type="submit">Salvar</button>
    </form>
</section>
    
</body>
</html>