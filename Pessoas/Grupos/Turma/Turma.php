<?php


namespace Minuz\Skoolie\Pessoas\Grupos\Turma;
use Minuz\Skoolie\Dados\BancoProvas;

class Turma
{
    protected array $alunosDaTurma = [];
    protected $ProvasDaTurma = [];
    
    public function __construct(public string $Turma)
    {
        $this->ProvasDaTurma = new BancoProvas($this->Turma);
    }

    public function adicionarProvaModelo($avaliacao): void
    {
        $this->ProvasDaTurma[$avaliacao->pegarNIP()] = $avaliacao;
    }


    public function adicionaAluno(Aluno $aluno)
    {
        $this->alunosDaTurma[$aluno->pegaRM()] = $aluno;
    }
    
    
    
}