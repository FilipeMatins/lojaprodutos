<?php
    // require_once __DIR__ . '/../../../config/env.php';
    require_once __DIR__ . '/../../model/UsuarioModel.php';

    

    // // Verifica se o ID foi passado via GET
    // $id = isset($_GET['id']);


   
    if (isset($_GET['id'])){
        $modo = 'EDICAO';
        $usuarioModel = new UsuarioModel();
        $buscar = $usuarioModel->buscarPorId($_GET['id']);

        $nome = $buscar->nome;
        $email = $buscar->email;
        $data_nascimento = $buscar->data_nascimento;
        $cpf = $buscar->cpf;
        $telefone = $buscar->telefone;
    }
    else {
        $modo = 'CRIACAO';
        $buscar =[
            'id'=>'',
            'nome'=>'',
            'email'=>'',
            'data_nascimento'=>'',
            'cpf'=>'',
            'telefone'=>'',
        ];
    }
?>

<?php require_once __DIR__ . '\..\components\head.php'; ?>



<body class="corpo-visualizar-categoria">
    <?php require_once __DIR__ . '\..\components\navbar.php'; ?>

    <?php require_once __DIR__ . '\..\components\sidebar.php'; ?>

    
    <section class="visualizar-categoria">
        
        <h3>Nome: <?php echo ($nome); ?></h3>
        <p>Email: <?php echo ($email); ?></p>
        <p>Data Nascimento: <?php echo ($data_nascimento); ?></p>
        <p>CPF: <?php echo ($cpf); ?></p>
        <p>Telefone: <?php echo ($telefone); ?></p>

        <div class="botoes-container">
        <form action="usuarios.php" method="GET">
            <button title="Voltar">
                <span class="material-symbols-outlined">
                    arrow_back
                </span>
            </button>
        </form>
        </div>
    </section>
    
</body>
</html>