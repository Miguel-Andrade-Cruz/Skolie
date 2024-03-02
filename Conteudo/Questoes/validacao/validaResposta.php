<?php
namespace Minuz\Skoolie\Conteudo\Questoes\validacao;

trait validaResposta
{
    private function validarResposta($resposta): bool
    {
        if(! in_array($resposta, self::pegaRespostasValidas())) {
            return false;
        }
        return true;
    }


    public function responder($resposta): void
    {
        if($this->validarResposta($resposta)) {
            $this->resposta = $resposta;
            return;
        }
        
        echo "Resposta inválida." . PHP_EOL;
        return;
    }

    

}