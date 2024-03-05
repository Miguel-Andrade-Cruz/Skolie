<?php
namespace Minuz\Skoolie\Pessoas\Grupos\Funcionarios;

use Minuz\Skoolie\Pessoas\Grupos\Funcionarios\Funcionario;
use Minuz\Skoolie\Conteudo\Avaliacoes\{Prova, Exercicio};
use Minuz\Skoolie\Dados\Cache\CacheProf;
use Minuz\Skoolie\Fluxo_dados\avaliacoes_fluxo;
use Minuz\Skoolie\Pessoas\Grupos\Turma\Turma;

class Professor extends Funcionario
{
    use avaliacoes_fluxo;

    protected $minhasAvaliacoes;

    public function __construct(string $nome, string $id, protected Turma $turma)
    {
        parent::__construct($nome, $id);
        $this->minhasAvaliacoes = new CacheProf($this->nome);
    }






    public function montarProva(
        string $NIP,
        string $titulo,
        string $turma,
        array|false $questoes = false
    ): Prova
    {
        $novaProva = new Prova($this->nome, $turma, $titulo, $NIP);
        // Nova prova (vazia) adicionada ao cache
        $this->minhasAvaliacoes->guardarAvaliacaoEmCache($novaProva);
        
        // Busca e adiciona as questões colocadas
        if(is_array($questoes)) {
            $this->adicionaQuestoes($novaProva->pegarNIP(), $questoes);
        }

        return $novaProva;
    }
    
    



    public function montarExercicio(
        string $NIP,
        string $titulo,
        string $turma, 
        array|false $questoes = false
    ): Exercicio
    {
        $novoExercicio = new Exercicio($this->nome, $turma, $titulo, $NIP);
        $this->minhasAvaliacoes->guardarAvaliacaoEmCache($novoExercicio);
        
        if(is_array($questoes)) {
            $this->adicionaQuestoes($novoExercicio->pegarNIP(), $questoes);
        
        }

        return $novoExercicio;
    }


    
    public function verMinhasAvaliacoes(): void
    {
        $this->minhasAvaliacoes->verListaAvaliacoes();
    }


    public function entregarProvasProntas()
    {
        foreach($this->minhasAvaliacoes as &$avaliacao) {
            $tipo = get_class($avaliacao);
            
            if($avaliacao->numeroQuestoes == $tipo::$maximoQuestoes) {
                
                $this->turma->adicionarProvaModelo($avaliacao);
            }
        }
    }
// TODO Fazer conexão professor -- banco de dados

}