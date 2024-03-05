<?php
namespace Minuz\Skoolie\Fluxo_dados;

use Minuz\Skoolie\Fluxo_dados\pegarAvaliacao;


trait avaliacoes_fluxo
{
    use pegarAvaliacao;


    
    public function adicionaQuestoes(string $NIP, array $questoes): void
    {
        $prova  = $this->pegarAvaliacao($NIP);
        
        $prova->adicionarQuestoes($questoes);

        
        $this->minhasAvaliacoes->guardarAvaliacaoEmCache($prova);
        
    }
    
    
    
    
    public function removeQuestoes(string $NIP, array $enumeradoDasQuestoes): void 
    {
        $prova = $this->pegarAvaliacao($NIP);
        
        $prova->removerQuestoes($enumeradoDasQuestoes);

        $this->minhasAvaliacoes->guardarAvaliacao($prova);
    }




    public function acesssarQuestoes($NIP): void 
    {
        $prova = $this->minhasAvaliacoes->verAvaliacao($NIP);
        $prova->visualizarQuestoes();
    }
}