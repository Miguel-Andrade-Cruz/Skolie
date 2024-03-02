<?php

namespace Minuz\Skoolie\Dados\Cache;

use Minuz\Skoolie\Dados\Cache\Cache;

class CacheAluno extends Cache
{
    protected array $minhasAvaliacoes = [];
    public function __construct(protected string $nome)
    {}

    
}