<?php
namespace Minuz\Skoolie\Conteudo\Avaliacoes;
use Minuz\Skoolie\Conteudo\Avaliacoes\gerenciador\gerenciaQuestoes;


class Exercicio extends Avaliacao
{
    use gerenciaQuestoes;

    private static int $maximoQuestoes = 5;
    
    public function __construct(
        string $Professor,
        string $Turma,
        string $titulo,
        int $NIP
    ) {
        parent::__construct($Professor, $Turma, $titulo, $NIP);
    }

    
}