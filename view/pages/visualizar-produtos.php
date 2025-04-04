<?php 
    require_once __DIR__ . '/../../model/ProdutosModel.php';

    

    // // Verifica se o ID foi passado via GET
    // $id = isset($_GET['id']);


   
    if (isset($_GET['id'])){
        $modo = 'EDICAO';
        $produtoModel = new ProdutoModel();
        $buscar = $produtoModel->buscarPorId($_GET['id']);

        $nome = $buscar->nome;
        $descricao = $buscar->descricao;
        $categoria_nome = $buscar->categoria_nome;
        $preco = $buscar->preco;
    }
    else {
        $modo = 'CRIACAO';
        $buscar =[
            'id'=>'',
            'nome'=>'',
            'descricao'=>'',
            'categoria_nome'=>'',
            'preco'=>'',
        ];
    }
?>

<?php require_once __DIR__ . '\..\components\head.php'; ?>



<body class="corpo-visualizar-categoria">
    <?php require_once __DIR__ . '\..\components\navbar.php'; ?>

    <?php require_once __DIR__ . '\..\components\sidebar.php'; ?>

    
    <section class="visualizar-categoria">
        <!-- Exibe o nome e a descrição da categoria -->
        <h3>Nome: <?php echo ($nome); ?></h3>
        <p>Descrição: <?php echo ($descricao); ?></p>
        <p>Categoria: <?php echo ($categoria_nome); ?></p>
        <p>Preço: <?php echo ($preco); ?></p>

        <div class="botoes-container">
        <form action="categorias.php" method="GET">
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