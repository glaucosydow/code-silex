<?php

//Inclui o arquivo de configuração
require_once __DIR__ . "/../bootstrap.php";



//Cria rota para a index
$app->get('/', function () {

    return "Acesse /clientes";

});

//Cria a rota /clientes
$app->get('/clientes', function () {

    $arrayClientes = [
        ['nome'=>'João Antônio', 'email'=>'joao@email.com', 'cpf'=>'111.222.333-44'],
        ['nome'=>'Rafael Santos', 'email'=>'rafael@email.com', 'cpf'=>'222.333.444-55'],
        ['nome'=>'Angela Maria', 'email'=>'angela@email.com', 'cpf'=>'444.333.444-55'],
        ['nome'=>'Maria Tavares', 'email'=>'maria@email.com', 'cpf'=>'999.333.777-55'],
    ];

    return json_encode($arrayClientes);
});


//Roda a aplicação
$app->run();