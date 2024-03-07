<?php
namespace Minuz\Skoolie\Pessoas\Grupos\Turma;

use Minuz\Skoolie\Conteudo\Avaliacoes\{Prova, Exercicio};
use Minuz\Skoolie\Dados\Cache\CacheAluno;
use Minuz\Skoolie\Pessoas\Pessoa;
use Minuz\Skoolie\Fluxo_dados\pegarAvaliacao;


class Aluno extends Pessoa
{
    use pegarAvaliacao;


    protected $minhasAvaliacoes;
    
    public function __construct(string $nome, Turma $turma, protected int $RM)
    {
        parent::__construct($nome);
        $turma->adicionaAluno($this);
        $this->minhasAvaliacoes = new CacheAluno($this->nome);
    }





    public function veListaAvaliacoes(): void
    {
        $this->minhasAvaliacoes->veListaAvaliacoes();
    }

    public function pegaRM(): int 
    {
        return $this->RM;
    }




    public function acessoAoCache($avaliacao): void
    {
        $this->minhasAvaliacoes->guardaAvaliacaoEmCache($avaliacao);
    }

    
    
    
    public function respondeAvaliacao(string $NIP, array $respostas): void 
    {
        $avaliacao = $this->pegaAvaliacao($NIP);
        $avaliacao->completaNIP($this->RM);


        $avaliacao->respondeAvaliacao($respostas);

    }
}