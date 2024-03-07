<?php
namespace Minuz\Skoolie\Conteudo\Avaliacoes;


class Prova extends Avaliacao
{

    protected static int $maximoQuestoes = 4;
    
    public function __construct(
        string $Professor,
        string $Turma,
        string $titulo,
        string $NIP
    ) {
        parent::__construct($Professor, $Turma, $titulo, $NIP);
    }

    public static function pegaMaximoQuestoes(): int
    {
        return self::$maximoQuestoes;
    }
}