<?php

namespace Aluno\ProjetoPHP\Model\Entity;

class Produtos{

    private $id;
    private $nome;
    private $descricao;
    private $valor;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getValor(){
        return $this->idade;
    }

    public function setIdade($valor){
        $this->valor = $valor;
    }

}