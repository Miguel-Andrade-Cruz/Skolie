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

    public function adicionaProvaModelo($avaliacao): void
    {
        $this->ProvasDaTurma->adicionaProvaModelo($avaliacao);

        foreach ($this->alunosDaTurma as $aluno) {
            
            $complementoDoNIP = $aluno->pegaRM();
            $avaliacao->completaNIP($complementoDoNIP);
            
            $aluno->acessoAoCache($avaliacao);
        }
    }


    public function adicionaAluno(Aluno $aluno)
    {
        $this->alunosDaTurma[$aluno->pegaRM()] = $aluno;
    }
    
    
    
}