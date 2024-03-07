<?php
namespace Minuz\Skoolie\Fluxo_dados;

use Minuz\Skoolie\Fluxo_dados\pegarAvaliacao;


trait avaliacoes_fluxo
{
    use pegarAvaliacao;


    
    public function adicionaQuestoes(string $NIP, array $questoes): void
    {
        $prova  = $this->pegaAvaliacao($NIP);
        
        $prova->adicionaQuestoes($questoes);

        
        $this->minhasAvaliacoes->guardaAvaliacaoEmCache($prova);
        
    }
    
    
    
    
    public function removeQuestoes(string $NIP, array $enumeradoDasQuestoes): void 
    {
        $prova = $this->pegaAvaliacao($NIP);
        
        $prova->removeQuestoes($enumeradoDasQuestoes);

        $this->minhasAvaliacoes->guardarAvaliacao($prova);
    }




    public function acesssarQuestoes($NIP): void 
    {
        $prova = $this->minhasAvaliacoes->veAvaliacao($NIP);
        $prova->visualizaQuestoes();
    }
}