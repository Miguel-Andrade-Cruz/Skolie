<?php

namespace Minuz\Skoolie\Dados\Cache;

use Minuz\Skoolie\Conteudo\Avaliacoes\{Prova, Exercicio};
use Minuz\Skoolie\Dados\Cache\Cache;

class CacheAluno extends Cache
{
    protected array $minhasAvaliacoes = [];
    public function __construct(protected string $nome)
    {}

    




    public function veListaAvaliacoes(): void 
    {
        $avaliacoes = "Aqui estão suas provas ainda não respondidas por completo:" . PHP_EOL;
        foreach($this->minhasAvaliacoes as $avaliacao) {

            $tipoAvaliacao = get_class($avaliacao);
            
            $questoesRespondidas = $avaliacao->pegaTotalRespondidas();
            $totalDeQuestoes = $tipoAvaliacao::pegaMaximoQuestoes();



            $avaliacoes .=
            "Avaliacao: {$avaliacao->titulo}. {$questoesRespondidas} de {$totalDeQuestoes} respondidas" . PHP_EOL;
        }

        echo $avaliacoes;
    }
}