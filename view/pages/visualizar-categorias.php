<?php


    $categorias =  [
        [
            'id'        => '1',
            'nome'      => 'Eletrônicos',
            'descricao' => 'Dispositivos como smartphones, notebooks e tablets.'
        ],
        [
            'id'        => '2',
            'nome'      => 'Eletrodomésticos',
            'descricao' => 'Produtos para o lar como geladeiras, fogões e máquinas de lavar.'
        ],
        [
            'id'        => '3',
            'nome'      => 'Roupas e Acessórios',
            'descricao' => 'Moda masculina, feminina e infantil, incluindo calçados.'
        ],
        [
            'id'        => '4',
            'nome'      => 'Beleza e Cuidados Pessoais',
            'descricao' => 'Produtos de maquiagem, perfumes e skincare.'
        ],
        [
            'id'        => '5',
            'nome'      => 'Saúde e Bem-estar',
            'descricao' => 'Suplementos, vitaminas e produtos para cuidados pessoais.'
        ],
        [
            'id'        => '6',
            'nome'      => 'Alimentos e Bebidas',
            'descricao' => 'Itens de mercado, bebidas e produtos gourmet.'
        ],
        [
            'id'        => '7',
            'nome'      => 'Casa e Decoração',
            'descricao' => 'Móveis, iluminação e artigos de decoração.'
        ],
        [
            'id'        => '8',
            'nome'      => 'Esportes e Lazer',
            'descricao' => 'Equipamentos esportivos, roupas fitness e bicicletas.'
        ],
        [
            'id'        => '9',
            'nome'      => 'Automotivo',
            'descricao' => 'Peças, acessórios e produtos para veículos.'
        ],
        [
            'id'        => '10',
            'nome'      => 'Brinquedos e Jogos',
            'descricao' => 'Jogos de tabuleiro, brinquedos educativos e eletrônicos.'
        ],
        [
            'id'        => '11',
            'nome'      => 'Papelaria e Escritório',
            'descricao' => 'Materiais escolares, organizadores e móveis para escritório.'
        ],
        [
            'id'        => '12',
            'nome'      => 'Livros e Mídia',
            'descricao' => 'Livros físicos, e-books e materiais educativos.'
        ],
        [
            'id'        => '13',
            'nome'      => 'Música e Instrumentos Musicais',
            'descricao' => 'Instrumentos, acessórios e equipamentos de áudio.'
        ],
        [
            'id'        => '14',
            'nome'      => 'Pet Shop',
            'descricao' => 'Rações, brinquedos e acessórios para pets.'
        ],
        [
            'id'        => '15',
            'nome'      => 'Ferramentas e Construção',
            'descricao' => 'Materiais para reformas, ferramentas e equipamentos de segurança.'
        ],
        [
            'id'        => '16',
            'nome'      => 'Relógios e Óculos',
            'descricao' => 'Relógios de pulso, óculos de grau e de sol.'
        ],
        [
            'id'        => '17',
            'nome'      => 'Energia Solar e Sustentabilidade',
            'descricao' => 'Placas solares, lâmpadas LED e produtos ecológicos.'
        ],
        [
            'id'        => '18',
            'nome'      => 'Segurança e Monitoramento',
            'descricao' => 'Câmeras de segurança, alarmes e fechaduras eletrônicas.'
        ],
        [
            'id'        => '19',
            'nome'      => 'Viagem e Turismo',
            'descricao' => 'Mochilas, malas de viagem e acessórios para turismo.'
        ],
        [
            'id'        => '20',
            'nome'      => 'Serviços Digitais',
            'descricao' => 'Cursos online, assinaturas e consultorias digitais.'
        ]

        
    ];
        
?>
<?php
    // Verifica se o ID foi passado via GET
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    
    $nome = '';
    $descricao = '';

    // Verifica se o ID não é nulo e busca a categoria correspondente
    if ($id !== null) {
        $categoria_encontrada = false; // Variável para verificar se encontramos a categoria

        // Percorre o array de categorias
        foreach ($categorias as $cat) {
            if ($cat['id'] == $id) {
                // Se encontrar a categoria, armazena os dados
                $nome = $cat['nome'];
                $descricao = $cat['descricao'];
                $categoria_encontrada = true; // Marca que a categoria foi encontrada
                break;
            }
        }

        // Se a categoria não for encontrada, define as variáveis como nulas ou vazias
        if (!$categoria_encontrada) {
            $nome = "Categoria não encontrada";
            $descricao = "A categoria solicitada não existe.";
        }
    } else {
        // Se não passar ID, também mostra uma mensagem de erro
        $nome = "ID inválido";
        $descricao = "Nenhuma categoria foi especificada.";
    }
?>

<?php require_once __DIR__ . '\..\components\head.php'; ?>



<body>
    <?php require_once __DIR__ . '\..\components\navbar.php'; ?>

    <?php require_once __DIR__ . '\..\components\sidebar.php'; ?>

    
    <section class="">
        <!-- Exibe o nome e a descrição da categoria -->
        <h3>Categoria: <?php echo ($nome); ?></h3>
        <p>Descrição: <br> <?php echo ($descricao); ?></p>

        <form action="categorias.php" method="GET">
            <button title="Voltar">
                <span class="material-symbols-outlined">
                    arrow_back
                </span>
            </button>
        </form>
    </section>
    
</body>
</html>