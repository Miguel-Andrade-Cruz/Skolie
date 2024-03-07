<?php
namespace Minuz\Skoolie\Pessoas\Grupos\Funcionarios;

use Minuz\Skoolie\Conteudo\Avaliacoes\{Prova, Exercicio};
use Minuz\Skoolie\Dados\Cache\CacheProf;
use Minuz\Skoolie\Fluxo_dados\avaliacoes_fluxo;
use Minuz\Skoolie\Pessoas\Grupos\Turma\Turma;
use Minuz\Skoolie\Pessoas\Grupos\Funcionarios\Funcionario;

class Professor extends Funcionario
{
    use avaliacoes_fluxo;

    protected $minhasAvaliacoes;

    public function __construct(string $nome, string $id, protected Turma $turma)
    {
        parent::__construct($nome, $id);
        $this->minhasAvaliacoes = new CacheProf($this->nome);
    }



    // Resolver como criar prova|exercicio com apenas um método
    public function montaAvaliacao(
        string $tipoAvaliacao,
        string $NIP,
        string $titulo,
        string $turma,
        array|false $questoes = false
    ): void
    {
        // Nova prova (vazia) adicionada ao cache
        $this->minhasAvaliacoes->guardaAvaliacaoEmCache(
            new $tipoAvaliacao($this->nome, $turma, $titulo, $NIP)
        );
        
        // Busca e adiciona as questões colocadas
        if(is_array($questoes)) {
            $this->adicionaQuestoes($NIP, $questoes);
        }

        return;
    }
    




    

    public function visualizaAvaliacao($NIP): void
    {
        $avaliacao = $this->minhasAvaliacoes->pegaAvaliacao($NIP);
        $avaliacao->visualizaAvaliacao();
    }

    


    
    public function verMinhasAvaliacoes(): void
    {
        $this->minhasAvaliacoes->veListaAvaliacoes();
    }


    public function entregaAvaliacao($NIP): void
    {
        $avaliacao = $this->minhasAvaliacoes->pegaAvaliacao($NIP);
        $tipoAvaliacao = get_class($avaliacao);
        $limite = $tipoAvaliacao::pegaMaximoQuestoes();

        if($avaliacao->pegaNumeroQuestoes() === $limite) {
            $this->turma->adicionaProvaModelo($avaliacao);
            $this->minhasAvaliacoes->removeAvaliacaoDoCache($NIP);
            
            return;
        }

        echo "Você ainda não completou a quantidade de questões da avaliação." . PHP_EOL;
        
    }

}