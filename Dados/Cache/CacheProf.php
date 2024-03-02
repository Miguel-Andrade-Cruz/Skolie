<?php
namespace Minuz\Skoolie\Dados\Cache;
use Minuz\Skoolie\Dados\Cache\Cache;
use Minuz\Skoolie\Conteudo\Avaliacoes\{Prova, Exercicio};


class CacheProf extends Cache
{
    protected array $minhasAvaliacoes = [];
    public function __construct(string $nome)
    {
        parent::__construct($nome);
    }


    public function pegarProvas(): array
    {
        return $this->minhasAvaliacoes;
    }

    
}