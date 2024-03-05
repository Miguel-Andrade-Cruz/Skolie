<?php

namespace Minuz\Skoolie\Pessoas\Grupos\Funcionarios;
use Minuz\Skoolie\Pessoas\Pessoa;


class Funcionario extends Pessoa
{
    public function __construct(string $nome, protected string $id)
    {
        parent::__construct($nome);
    }




}