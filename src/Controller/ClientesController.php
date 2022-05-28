<?php

namespace Aluno\ProjetoPHP\Controller;

use Aluno\ProjetoPhp\Model\DAO\ClientesDAO;
use Aluno\ProjetoPhp\Model\Entity\Clientes;

class ClientesController{

    //private ClientesDAO $dao

    public static function abrirFormularioInserir(){
        require_once "../src/View/inserir_cliente.php";
    }

    public static function abrirFormularioAlterar(){
        $dao = new ClientesDAO();
        $resultado = $dao->consultar();
        require_once "../src/View/inserir_clientes.php";
    }

    public static function abrirListaClientes(){
        require_once "../src/View/listar_cliente.php";
    }

    public static function inserirCliente(){
        $cliente = new Clientes();
        $cliente->setEmail($_POST['email']);
        $cliente->setIdade($_POST['idade']);
        $cliente->setNome($_POST['nome']);
        $dao = new ClientesDAO();
        if ($dao->inserir($cliente)){
            $resposta = true;
        } else {
            $resposta = false;
        }
        ClientesController::abrirListaClientes();
    }

}