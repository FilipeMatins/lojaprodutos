-- categoria
insert into categoria (nome, descricao)
values ('Eletrônicos','Dispositivos como smartphones, notebooks e tablets.');
insert into categoria (nome, descricao)
values('Eletrodomésticos','Produtos para o lar como geladeiras, fogões e máquinas de lavar.');
insert into categoria (nome, descricao)
values('Roupas e Acessórios','Moda masculina, feminina e infantil, incluindo calçados.');
insert into categoria (nome, descricao)
values('Beleza e Cuidados Pessoais','Produtos de maquiagem, perfumes e skincare.');
insert into categoria (nome, descricao)
values('Saúde e Bem-estar','Suplementos, vitaminas e produtos para cuidados pessoais.');
insert into categoria (nome, descricao)
values('Alimentos e Bebidas','Itens de mercado, bebidas e produtos gourmet.');
insert into categoria (nome, descricao)
values('Casa e Decoração','Móveis, iluminação e artigos de decoração.');
insert into categoria (nome, descricao)
values('Esportes e Lazer','Equipamentos esportivos, roupas fitness e bicicletas.');
insert into categoria (nome, descricao)
values('Automotivo','Peças, acessórios e produtos para veículos.');
insert into categoria (nome, descricao)
values('Brinquedos e Jogos','Jogos de tabuleiro, brinquedos educativos e eletrônicos.');
insert into categoria (nome, descricao)
values('Papelaria e Escritório','Materiais escolares, organizadores e móveis para escritório.');
insert into categoria (nome, descricao)
values('Livros e Mídia','Livros físicos, e-books e materiais educativos.');
insert into categoria (nome, descricao)
values('Música e Instrumentos Musicais','Instrumentos, acessórios e equipamentos de áudio.');
insert into categoria (nome, descricao)
values('Pet Shop','Rações, brinquedos e acessórios para pets.');

-- produtos
insert into produtos (nome, descricao, id_categoria, preco)
value ('iPhone 15', 'Smartphone com tela OLED de 6,1 polegadas e chip A17.', 1, '5999.00');
insert into produtos (nome, descricao, id_categoria, preco)
value ('Geladeira Samsung 520L', 'Geladeira de 520 litros com tecnologia de refrigeração no-frost.', 2, '3499.00');
insert into produtos (nome, descricao, id_categoria, preco)
value ('Tênis Nike Air Max', 'Tênis de corrida com amortecimento Air Max e design moderno.', 3, '499.90');
insert into produtos (nome, descricao, id_categoria, preco)
value ('Base Líquida L’Oréal', 'Base líquida de alta cobertura com efeito matte e longa duração.', 4, '89.90');
insert into produtos (nome, descricao, id_categoria, preco)
value ('Multivitamínico One a Day', 'Suplemento diário para melhorar a saúde geral e aumentar a imunidade.', 5, '69.90');
insert into produtos (nome, descricao, id_categoria, preco)
value ('Cerveja Artesanal IPA', 'Cerveja artesanal com sabor intenso e amargor característico.', 6, '19.90');
insert into produtos (nome, descricao, id_categoria, preco)
value ('Sofá Retrátil 3 Lugares', 'Sofá retrátil e reclinável, ideal para conforto e elegância na sua sala.', 7, '1599.00');
insert into produtos (nome, descricao, id_categoria, preco)
value ('Bicicleta MTB Aro 29', 'Bicicleta de mountain bike com suspensão dianteira e aro 29.', 8, '1899.00');
insert into produtos (nome, descricao, id_categoria, preco)
value ('Kit de Faróis LED para Carro', 'Kit completo de faróis LED para melhoria da visibilidade do seu veículo.', 9, '299.00');
insert into produtos (nome, descricao, id_categoria, preco)
value ('Jogo de Tabuleiro Catan', 'Jogo de estratégia onde os jogadores constroem e negociam recursos.', 10, '249.90');
insert into produtos (nome, descricao, id_categoria, preco)
value ('Caderno Universitário 10 Matérias', 'Caderno espiral com 10 matérias e capa personalizada.', 11, '19.90');
insert into produtos (nome, descricao, id_categoria, preco)
value ('O Senhor dos Anéis - Edição Especial', 'Edição luxuosa com capa dura e ilustrações exclusivas do clássico de J.R.R. Tolkien.', 12, '149.90');
insert into produtos (nome, descricao, id_categoria, preco)
value ('Violão Yamaha F310', 'Violão acústico de excelente qualidade, ideal para iniciantes.', 13, '799.00');
insert into produtos (nome, descricao, id_categoria, preco)
value ('Ração Pedigree Sabor Frango', 'Ração seca para cães, sabor frango e com nutrientes balanceados.', 14, '59.90');

-- utilizar dessa forma das proximas vezes, se o id for apagado ele busca o novo id e implemnta na tabela automaticamente
insert into produtos (nome, descricao, id_categoria, preco)
value ('iphone','Smartphone com tela OLED de 6,1 polegadas e chip A17.',(select id from categoria where nome = 'Eletrônicos'), '5999.00')

-- usuario
insert into usuarios (nome, email, data_nascimento, cpf, telefone)
values ('João Silva', 'joao.silva@email.com', '1990-01-15', '12345678901', '11999990001');
insert into usuarios (nome, email, data_nascimento, cpf, telefone)
values ('Maria Oliveira', 'maria.oliveira@email.com', '1985-02-20', '12345678902', '11999990002');
insert into usuarios (nome, email, data_nascimento, cpf, telefone)
values ('Carlos Souza', 'carlos.souza@email.com', '1990-01-16', '12345678903', '11999990003');
insert into usuarios (nome, email, data_nascimento, cpf, telefone)
values ('Ana Lima', 'ana.lima@email.com', '1990-05-23', '12345678904', '11999990004');
insert into usuarios (nome, email, data_nascimento, cpf, telefone)
values ('Pedro Santos', 'pedro.santos@email.com', '1980-07-12', '12345678905', '11999990005');
insert into usuarios (nome, email, data_nascimento, cpf, telefone)
values ('Juliana Costa', 'juliana.costa@email.com', '1993-03-15', '12345678906', '11999990006');
insert into usuarios (nome, email, data_nascimento, cpf, telefone)
values ('Lucas Almeida', 'lucas.almeida@email.com', '1990-02-29', '12345678907', '11999990007');
insert into usuarios (nome, email, data_nascimento, cpf, telefone)
values ('Fernanda Rocha', 'fernanda.rocha@email.com', '1995-02-01', '12345678908', '11999990008');
insert into usuarios (nome, email, data_nascimento, cpf, telefone)
values ('Ricardo Mendes', 'ricardo.mendes@email.com', '1992-12-19', '12345678909', '11999990009');
insert into usuarios (nome, email, data_nascimento, cpf, telefone)
values ('Camila Nogueira', 'camila.nogueira@email.com', '1989-07-05', '12345678910', '11999990010');