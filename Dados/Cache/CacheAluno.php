<?php

namespace Minuz\Skoolie\Dados\Cache;

use Minuz\Skoolie\Conteudo\Avaliacoes\{Prova, Exercicio};
use Minuz\Skoolie\Dados\Cache\Cache;

class CacheAluno extends Cache
{
    protected array $minhasAvaliacoes = [];
    public function __construct(protected string $nome)
    {}

    




    public function verListaAvaliacoes(): void 
    {
        $avaliacoes = "Aqui estão suas provas ainda não respondidas por completo:" . PHP_EOL;
        foreach($this->minhasAvaliacoes as $avaliacao) {
            
            $avaliacoes .= "Avaliacao: {$avaliacao->titulo}" . PHP_EOL;
        }

        echo $avaliacoes;
    }
}