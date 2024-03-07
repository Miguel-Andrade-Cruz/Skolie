<?php
namespace Minuz\Skoolie\Dados\Cache;
use Minuz\Skoolie\Conteudo\Avaliacoes\{Prova, Exercicio};
abstract class Cache
{
    protected array $minhasAvaliacoes = [];
    public function __construct(protected string $nome)
    {}

    public function guardaAvaliacaoEmCache(Prova|Exercicio $avaliacao): void
    {
        $this->minhasAvaliacoes[$avaliacao->pegaNIP()] = $avaliacao;
    }
    

    public function removeAvaliacaoDoCache($NIP): void 
    {
        unset($this->minhasAvaliacoes[$NIP]);
    }

    
    public function &pegaAvaliacao($NIP): Prova|Exercicio
    {
        return $this->minhasAvaliacoes[$NIP];
    }
    
}