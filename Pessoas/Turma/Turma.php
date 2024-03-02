<?php


namespace Minuz\Skoolie\Pessoas\Turma;
use Minuz\Skoolie\Dados\BancoProvas;

class Turma
{
    protected array $alunosDaTurma = [];
    
    public function __construct(public string $Turma)
    {
        $Provas = new BancoProvas($this->Turma);
    }


    public function adicionaAluno(Aluno $aluno)
    {
        $this->alunosDaTurma[$aluno->pegaRM()] = $aluno;
    }

    
}