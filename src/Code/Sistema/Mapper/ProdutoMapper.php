<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 27/11/14
 * Time: 21:14
 */

namespace Code\Sistema\Mapper;

use \Code\Sistema\Mapper\Interfaces\MapperInterface;
use \Code\Sistema\Entity\Interfaces\ProdutoInterface;

class ProdutoMapper implements MapperInterface
{
        private $pdo;

        public function __construct(\PDO $pdo)
        {
            $this->pdo = $pdo;
        }

        public function insert(ProdutoInterface $produto)
        {
            $stmt = $this->pdo->prepare("INSERT INTO produtos ( nome, descricao, valor ) VALUES ( :nome,:descricao,:valor )");
            $stmt->bindValue(':nome', $produto->getNome());
            $stmt->bindValue(':descricao', $produto->getDescricao());
            $stmt->bindValue(':valor', $produto->getValor());

            if($stmt->execute())
                return true;

            return false;
        }

        public function findAll()
        {
            $stmt = $this->pdo->prepare("SELECT * FROM produtos");
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
} 