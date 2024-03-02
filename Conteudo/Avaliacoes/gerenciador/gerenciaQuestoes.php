<?php
namespace Minuz\Skoolie\Conteudo\Avaliacoes\gerenciador;
use Minuz\Skoolie\Conteudo\Avaliacoes\{Exercicio, Prova};

trait gerenciaQuestoes
{
    public function adicionaQuestoes($questoes): void 
    {
        foreach($questoes as $questao) {
            $this->listaQuestoes[$this->numeroQuestoes +1] = $questao;
            $this->numeroQuestoes++;
        }
    }

    public function removeQuestoes($numeroQuestoes): void
    {
        foreach($numeroQuestoes as $numeroQuestao) {
            unset($this->listaQuestoes[$numeroQuestao -1]);
            $this->numeroQuestoes--;
        }
    }

    

}