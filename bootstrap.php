<?php

//use Aluno\Projeto\Controller\ExercicioController;

require_once __DIR__."/vendor/autoload.php";

//Aqui a gente recupera o que o usuário digitou e qual método HTTP ele digitou
$method = $_SERVER["REQUEST_METHOD"];
$path = $_SERVER["PATH_INFO"];

//Instanciar classe router

$router = new \Aluno\Projeto\Router($method, $path);

//Adicionar as rotas válidas abaixo

$router->get("/ola-mundo", function(){
    return "Olá, Mundo!";
});

$router->get("/exemplo", 'Aluno\\Projeto\Controller\ExercicioController::exibir');

$router->post("/exibir-resultado", 'Aluno\\Projeto\Controller\ExercicioController::exibirResultado');

//Adicionar as rotas válidas acima

$result = $router->handler();

if (!$result){
    http_response_code(404);
    echo "Pagina não encontrada";
    die();
}

echo $result($router->getParams());