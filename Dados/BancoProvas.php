<?php
namespace Minuz\Skoolie\Dados;

class BancoProvas
{
    public function __construct(protected string $turma)
    {
    }

    private array $ProvasModelo = [];

    private array $ProvasAlunos = [];




    public function adicionarProvaAluno(&$provaAluno): void 
    {
        $this->ProvasAlunos[$provaAluno->nome] = $provaAluno;
    }



    
}