<?php 
   require_once __DIR__ . '/../../model/ProdutosModel.php';

   $produtoModel = new ProdutoModel();
   $listar = $produtoModel->listar();

 ?>


<?php require_once __DIR__ . '\..\components\head.php'; ?>

<body>
    <?php require_once __DIR__ . '\..\components\navbar.php'; ?>

    <?php require_once __DIR__ . '\..\components\sidebar.php'; ?>

    <main>
        <h1>Produtos</h1>
        <div class="novo-btn-container">
            <form action="cadastro-produtos.php" method="GET">
                <button class="novo-btn" title="Novo Cadastro">
                    Novo
                </button>
            </form>
        </div>

        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Preço</th>
            </thead>
            <tbody>
                <?php foreach ($listar as $produto) { ?>
                    <tr>
                        <td><?php echo $produto['id'] ?></td>
                        <td><?php echo $produto['nome'] ?></td>
                        <td><?php echo $produto['descricao'] ?></td>
                        <td><?php echo $produto['categoria_nome'] ?></td>
                        <td><?php echo $produto['preco'] ?></td>
                        <td>
                            <!-- METHODS - Get / Post -->
                            <form action="visualizar-produtos.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
                                <input type="hidden" name="origem" value="listar">
                                <button title="Detalhes">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </form>

                            <form action="cadastro-produtos.php" method="GET">
                                <input type="hidden" 
                                    name="id" 
                                    value="<?php echo $produto['id']; ?>">
                                <button title="Detalhes">
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span>
                                </button>
                            </form>

                            <form action="deletar-produtos.php" method="POST">
                                <input type="hidden" 
                                    name="id" 
                                    value="<?php echo $produto['id']; ?>">
                                <button onclick="return confirm('Tem certeza que deseja deletar o produto?')">
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