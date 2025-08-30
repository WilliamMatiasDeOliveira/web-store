<?php

// coleção de rotas
$routes = [
    'inicio'=>'mainController@index',
    'loja'=>'mainController@loja',
    'carrinho'=>'lojaController@carrinho'
];

// define o action padrão
$action = 'inicio';

// verifica se existe um action na query string
if(isset($_GET['rota'])){
    // verifica se a action existe nas rotas
    if(!key_exists($_GET['rota'], $routes)){
        $action = 'inicio';
    } else {
        $action = $_GET['rota']; 
    }
}

// tratamento da rota
$partes = explode("@", $routes[$action]);
$controller = "core\\controllers\\". ucfirst($partes[0]);
$metodo = $partes[1];

$ctr = new $controller();

$ctr->$metodo();








