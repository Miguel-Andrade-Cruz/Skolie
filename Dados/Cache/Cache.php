<?php
namespace Minuz\Skoolie\Dados\Cache;
use Minuz\Skoolie\Conteudo\Avaliacoes\{Prova, Exercicio};
abstract class Cache
{
    protected array $minhasAvaliacoes = [];
    public function __construct(protected string $nome)
    {}

    public function guardarAvaliacaoEmCache(Prova|Exercicio &$avaliacao): void
    {
        $this->minhasAvaliacoes[$avaliacao->pegarNIP()] = $avaliacao;
    }
    
    

    public function &enviarAvaliacaoAoBanco($NIP): Prova|Exercicio
    {
        $avaliacao = $this->minhasAvaliacoes[$NIP];
        return $avaliacao;

    }
    
    public function &acessarAvaliacao($NIP): Prova|Exercicio
    {
        return $this->minhasAvaliacoes[$NIP];
    }
}