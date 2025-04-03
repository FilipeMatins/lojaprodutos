<?php
    // require_once __DIR__ . '/../../../config/env.php';
    require_once __DIR__ . '/../../model/CategoriaModel.php';

    

    // // Verifica se o ID foi passado via GET
    // $id = isset($_GET['id']);


   
    if (isset($_GET['id'])){
        $modo = 'EDICAO';
        $categoriaModel = new CategoriaModel();
        $buscar = $categoriaModel->buscarPorId($_GET['id']);

        $nome = $buscar->nome;
        $descricao = $buscar->descricao;
    }
    else {
        $modo = 'CRIACAO';
        $buscar =[
            'id'=>'',
            'nome'=>'',
            'descricao'=>'',
        ];
    }
?>

<?php require_once __DIR__ . '\..\components\head.php'; ?>



<body class="corpo-visualizar-categoria">
    <?php require_once __DIR__ . '\..\components\navbar.php'; ?>

    <?php require_once __DIR__ . '\..\components\sidebar.php'; ?>

    
    <section class="visualizar-categoria">
        <!-- Exibe o nome e a descrição da categoria -->
        <h3>Categoria: <?php echo ($nome); ?></h3>
        <p>Descrição: <?php echo ($descricao); ?></p>

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