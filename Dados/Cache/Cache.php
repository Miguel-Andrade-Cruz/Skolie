<?php
namespace Minuz\Skoolie\Dados\Cache;
use Minuz\Skoolie\Conteudo\Avaliacoes\{Prova, Exercicio};

abstract class Cache
{
    protected array $minhasAvaliacoes = [];
    public function __construct(protected string $nome)
    {}


    public function guardaAvaliacao(Prova|Exercicio &$avaliacao): void
    {
        $this->minhasAvaliacoes[$avaliacao->pegaNIP()] = $avaliacao;
    }
    
    public function verMinhasProvas(): void 
    {
        $avaliacoes = "Aqui estão suas provas ainda não enviadas:" . PHP_EOL;
        foreach($this->minhasAvaliacoes as $avaliacao) {
            $avaliacoes .= "Avaliação: {$avaliacao->titulo}. Código NIP: {$avaliacao->pegaNIP()}" . PHP_EOL;
        }

        echo $avaliacoes;
    }

    
}