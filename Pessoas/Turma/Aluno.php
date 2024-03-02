<?php
namespace Minuz\Skoolie\Pessoas\Turma;
use Minuz\Skoolie\Dados\Cache\CacheAluno;
use Minuz\Skoolie\Pessoas\Pessoa;


class Aluno extends Pessoa
{
    protected $minhasProvas;
    
    public function __construct(string $nome, Turma $turma, protected int $RM)
    {
        parent::__construct($nome);
        $turma->adicionaAluno($this);
        $this->minhasProvas = new CacheAluno($this->nome);
    }




    

    public function pegaRM(): int 
    {
        return $this->RM;
    }

}