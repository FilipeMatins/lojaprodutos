<?php
	require_once __DIR__ . '/../../model/UsuarioModel.php';

    $usuarioModel = new UsuarioModel();
    $listar = $usuarioModel->listar();
?>

<?php require_once __DIR__ . '\..\components\head.php'; ?>

<body>
    <?php require_once __DIR__ . '\..\components\navbar.php'; ?>

    <?php require_once __DIR__ . '\..\components\sidebar.php'; ?>

    <main>
        <h1>Usuarios</h1>
        <div class="novo-btn-container">
            <form action="cadastro-usuarios.php" method="GET">
                <button class="novo-btn" title="Novo Cadastro">
                    Novo
                </button>
            </form>
        </div>

        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Data de Nascimento</th>
                <th>CPF</th>
                <th>Telefone</th>
            </thead>
            <tbody>
                <?php foreach ($listar as $usuario) { ?>
                    <tr>
                        <td><?php echo $usuario['id'] ?></td>
                        <td><?php echo $usuario['nome'] ?></td>
                        <td><?php echo $usuario['email'] ?></td>
                        <td><?php echo $usuario['data_nascimento'] ?></td>
                        <td><?php echo $usuario['cpf'] ?></td>
                        <td><?php echo $usuario['telefone'] ?></td>
                        
                        <td>
                            <!-- METHODS - Get / Post -->
                            <form action="visualizar-usuarios.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                                <input type="hidden" name="origem" value="listar">
                                <button title="Detalhes">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </form>

                            <form action="cadastro-usuarios.php" method="GET">
                                <input type="hidden" 
                                    name="id" 
                                    value="<?php echo $usuario['id']; ?>">
                                <button title="Detalhes">
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span>
                                </button>
                            </form>

                            <form action="deletar-usuarios.php" method="POST">
                                <input type="hidden" 
                                    name="id" 
                                    value="<?php echo $usuario['id']; ?>">
                                <button onclick="return confirm('Tem certeza que deseja deletar o Usuário?')">
                                    <span class="material-symbols-outlined">
                                        delete
                                    </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>

    <?php require_once __DIR__ . '\..\components\footer.php'; ?>
</body>

</html>