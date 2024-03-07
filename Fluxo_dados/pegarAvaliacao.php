<?php

namespace Minuz\Skoolie\Fluxo_dados;
use Minuz\Skoolie\Conteudo\Avaliacoes\{Exercicio, Prova};


trait pegarAvaliacao
{

    public function pegaAvaliacao(string $NIP): Prova|Exercicio|false
    {
        if(! preg_match("~^[0-9]{3}-XXXX$~", $NIP)) {
            echo "Código NIP inválido, por favor tente novamente";
            return false;
        }
        
        $avaliacao = $this->minhasAvaliacoes->pegaAvaliacao($NIP);
        
        return $avaliacao;
    }

}