<?php

namespace Minuz\Skoolie\Conteudo\Questoes\Objetivas;
use Minuz\Skoolie\Conteudo\Questoes\Questao;

abstract class Objetiva extends Questao
{

    
    protected array $gabarito = [];

    public function __construct(string $pergunta,
    protected string $resposta_certa,
    )
    {
        parent:: __construct($pergunta);
        $this->gabarito[$this->pergunta] = $this->resposta_certa;
    }


    public function pegaGabarito(): array
    {
        return $this->gabarito;
    }

    
}