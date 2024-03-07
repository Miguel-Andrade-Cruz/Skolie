<?php
namespace Minuz\Skoolie\Dados;

class BancoProvas
{
    public function __construct(protected string $turma)
    {
    }

    private array $ProvasModelo = [];

    private array $ProvasAlunos = [];




    public function adicionaProvaModelo($provaModelo):void
    {
        $this->ProvasModelo[$provaModelo->pegaTitulo()] = $provaModelo;
    }



    public function adicionaProvaAluno($provaAluno): void 
    {
        $this->ProvasAlunos[$provaAluno->nome] = $provaAluno;
    }



    
}