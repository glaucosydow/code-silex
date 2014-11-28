<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 27/11/14
 * Time: 21:43
 */

namespace Code\Sistema\Service;

use Code\Sistema\Entity\Interfaces\ProdutoInterface;
use Code\Sistema\Mapper\Interfaces\MapperInterface;
use \Code\Sistema\Service\Interfaces\ProdutoServiceInterface;

class ProdutoService implements ProdutoServiceInterface
{

        private $produto;
        private $mapper;

        public function __construct(ProdutoInterface $produto, MapperInterface $mapper)
        {
            $this->produto = $produto;
            $this->mapper = $mapper;
        }

        public function insert(array $data)
        {
            $produtoEntity = $this->produto;
            $produtoEntity->setNome($data['nome']);
            $produtoEntity->setDescricao($data['descricao']);
            $produtoEntity->setValor($data['valor']);

            return $this->mapper->insert($produtoEntity);
        }

        public function findAll()
        {
            return $this->mapper->findAll();
        }

} 