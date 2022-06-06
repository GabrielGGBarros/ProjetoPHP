<?php

namespace Aluno\ProjetoPHP\Model\DAO;

use Aluno\ProjetoPHP\Model\Entity\Produtos;

class ClientesDAO{

    public function inserir(Produtos $c){
        try{
            $sql = "INSERT INTO `produtos`('id', `nome`, `descricao`, `valor`) VALUES (:id, :nome, :descricao, :valor)";
            $p = Conexao::conectar()->prepare($sql);
            $p->bindValue(":id", $c->getId());
            $p->bindValue(":nome", $c->getNome());
            $p->bindValue(":descricao", $c->getDescricao());
            $p->bindValue(":valor", $c->getValor());
            return $p->execute();
        } catch(\Exception $e){
            return false;
        }
    }

    public function alterar(Produtos $c){
        try{
            $sql = "UPDATE `produtos` SET `nome`=:nome,`descricao`=:descricao,`valor`=:valor WHERE id = :id";
            $p = Conexao::conectar()->prepare($sql);
            $p->bindValue(":id", $c->getId());
            $p->bindValue(":nome", $c->getNome());
            $p->bindValue(":descricao", $c->getDescricao());
            $p->bindValue(":valor", $c->getValor());
            return $p->execute();
        } catch(\Exception $e){
            return false;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM `produtos` WHERE id = :id";
            $p = Conexao::conectar()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return false;
        }
    }

    public function consultar(){
        try{
            $sql = "SELECT * FROM produtos";
            return Conexao::conectar()->query($sql);
        } catch(\Exception $e){
            return false;
        }
    }

    public function consultarPorId($id){
        try{
            $sql = "SELECT * FROM produtos WHERE id = :id";
            $p = Conexao::conectar()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return false;
        }
    }

}