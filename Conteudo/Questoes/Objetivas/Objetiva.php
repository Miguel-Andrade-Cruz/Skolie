<?php

namespace Minuz\Skoolie\Conteudo\Questoes\Objetivas;
use Minuz\Skoolie\Conteudo\Questoes\Questao;
use Minuz\Skoolie\Conteudo\Questoes\Objetivas\validacao\validar;

abstract class Objetiva extends Questao
{

    use validar;
    
    protected array $gabarito = [];


    public function __construct(string $pergunta,
    protected string $resposta_certa,
    )
    {
        parent:: __construct($pergunta);
        $this->gabarito[$this->pergunta] = $this->resposta_certa;
    }


    public function responde($resposta): void
    {
        if($this->validaResposta($resposta)) {
            $this->resposta = $resposta;
            return;
        }
        
        echo "Resposta inválida." . PHP_EOL;
        return;
    }



    public function pegaGabarito(): array
    {
        return $this->gabarito;
    }

    
}