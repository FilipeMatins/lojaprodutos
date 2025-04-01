<?php
    // require_once __DIR__ . '/../../../config/env.php';
    require_once __DIR__ . '/../../model/CategoriaModel.php';

    $categoriaModel = new CategoriaModel();
    $listar = $categoriaModel->listar();
?>

<?php require_once __DIR__ . '\..\components\head.php'; ?>



<body>
    <?php require_once __DIR__ . '\..\components\navbar.php'; ?>

    <?php require_once __DIR__ . '\..\components\sidebar.php'; ?>

    <main>
        
        <h1>Categorias</h1>
        <div class="novo-btn-container">
            <a href="cadastro.php" class="novo-btn">Novo</a>
        </div>

        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
            </thead>
            <tbody>
                <?php foreach ($listar as $cat) { ?>
                    <tr>
                        <td><?php echo $cat['id'] ?></td>
                        <td><?php echo $cat['nome'] ?></td>
                        <td><?php echo $cat['descricao'] ?></td>
                        <td>
                            <!-- METHODS - Get / Post -->
                            <form action="visualizar-categorias.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $cat['id']; ?>">
                                <input type="hidden" name="origem" value="listar">
                                <button title="Detalhes">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </form>

                            <form action="cadastro.php" method="GET">
                                <input type="hidden" 
                                    name="id" 
                                    value="<?php echo $cat['id']; ?>">
                                <button title="Detalhes">
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span>
                                </button>
                            </form>

                            <form action="deletar.php" method="POST">
                                <input type="hidden" 
                                    name="id" 
                                    value="<?php echo $cat['id']; ?>">
                                <button onclick="return confirm('Tem certeza que deseja deletar essa categoria?')">
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