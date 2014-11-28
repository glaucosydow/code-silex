<?php

namespace Code\Sistema\Entity;

use \Code\Sistema\Entity\Interfaces\ProdutoInterface;

class Produto implements ProdutoInterface
{
        private $id;
        private $nome;
        private $descricao;
        private $valor;


        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $descricao
         */
        public function setDescricao($descricao)
        {
            $this->descricao = $descricao;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getDescricao()
        {
            return $this->descricao;
        }

        /**
         * @param mixed $nome
         */
        public function setNome($nome)
        {
            $this->nome = $nome;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getNome()
        {
            return $this->nome;
        }

        /**
         * @param mixed $valor
         */
        public function setValor($valor)
        {
            $this->valor = $valor;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getValor()
        {
            return $this->valor;
        }



} 