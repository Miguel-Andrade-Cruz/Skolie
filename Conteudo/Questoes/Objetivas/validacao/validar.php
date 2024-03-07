<?php
namespace Minuz\Skoolie\Conteudo\Questoes\Objetivas\validacao;

trait validar
{
    private function validaResposta($resposta): bool
    {
        $tipoQuestao = get_class($this);
        
        if(! in_array($resposta, $tipoQuestao::confereRespostasValidas())) {
            echo "Resposta para questão objetiva inválida.";
            return false;
        }
        
        return true;
    }



}