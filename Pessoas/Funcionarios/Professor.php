<?php
namespace Minuz\Skoolie\Pessoas\Funcionarios;

use Minuz\Skoolie\Pessoas\Pessoa;
use Minuz\Skoolie\Conteudo\Avaliacoes\{Prova, Exercicio};
use Minuz\Skoolie\Dados\Cache\CacheProf;
use Minuz\Skoolie\Conteudo\Avaliacoes\gerenciador\gerenciaQuestoes;

class Professor extends Pessoa
{
    use gerenciaQuestoes;
    protected $minhasAvaliacoes;

    public function __construct(string $nome, )
    {
        parent::__construct($nome);
        $this->minhasAvaliacoes = new CacheProf($this->nome);
    }


    public function montarProva(int $NIP, string $titulo, string $turma, array|false $questoes = false): Prova
    {
        $novaProva = new Prova($this->nome, $turma, $titulo, $NIP);
        if(is_array($questoes)) {
            $novaProva->adicionaQuestoes($questoes);
            
            $this->minhasAvaliacoes->guardaAvaliacao($novaProva);
        }
        
        return $novaProva;
    }
    
    
    public function montarExercicio(int $NIP, string $titulo, string $turma, array|false $questoes = false): Exercicio
    {
        $novoExercicio = new Exercicio($this->nome, $turma, $titulo, $NIP);
        if(is_array($questoes)) {
            $novoExercicio->adicionaQuestoes($questoes);
        
            $this->minhasAvaliacoes->guardaAvaliacao($novoExercicio);
        }

        return $novoExercicio;
    }


    
    public function pegaCache(): CacheProf
    {
        return $this->minhasAvaliacoes;
    }


}