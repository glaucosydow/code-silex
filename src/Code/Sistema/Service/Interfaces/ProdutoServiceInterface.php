<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 27/11/14
 * Time: 20:19
 */

namespace Code\Sistema\Service\Interfaces;

use \Code\Sistema\Entity\Interfaces\ProdutoInterface;
use \Code\Sistema\Mapper\Interfaces\MapperInterface;

interface ProdutoServiceInterface
{
    public function __construct(ProdutoInterface $produto, MapperInterface $mapper);
    public function insert(array $data);
} 