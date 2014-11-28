<?php

//Inclui o arquivo de configuração
require_once __DIR__ . "/../bootstrap.php";


$app['produtoFixture'] = function(){
    $con = new \Code\Sistema\DB\Connection();
    return new \Code\Sistema\Fixtures\Fixtures($con->get());
};

$app['produtoService'] = function() use ($app){
    $con = new \Code\Sistema\DB\Connection();

    $app['produtoFixture']->init();

    $produtoEntity = new \Code\Sistema\Entity\Produto();
    $produtoMapper = new \Code\Sistema\Mapper\ProdutoMapper($con->get());

    return new \Code\Sistema\Service\ProdutoService($produtoEntity, $produtoMapper);
};


//Cria rota para a index
$app->get('/', function () {

    return "Acesse /produtos";

});

//Cria a rota /clientes
$app->get('/clientes', function () use ($app) {

    $arrayClientes = [
        ['nome'=>'João Antônio', 'email'=>'joao@email.com', 'cpf'=>'111.222.333-44'],
        ['nome'=>'Rafael Santos', 'email'=>'rafael@email.com', 'cpf'=>'222.333.444-55'],
        ['nome'=>'Angela Maria', 'email'=>'angela@email.com', 'cpf'=>'444.333.444-55'],
        ['nome'=>'Maria Tavares', 'email'=>'maria@email.com', 'cpf'=>'999.333.777-55'],
    ];

    return $app->json($arrayClientes);
});


//Cria a rota /produtos
$app->get('/produtos', function () use ($app) {

    $dados['nome'] = "Televisão 50 polegadas";
    $dados['descricao'] = "Com conversor digital, Full HD, Modo Futebol";
    $dados['valor'] = 1599.90;

    $result = $app['produtoService']->insert($dados);
    if($result){
        $produtos = $app['produtoService']->findAll();
        $app['produtoFixture']->end();
        return $app->json($produtos);
    }

    return false;
});


//Roda a aplicação
$app->run();