<?php

namespace Minuz\Skoolie\Conteudo\Questoes;

abstract class Questao
{
    protected string $resposta = "[. . .]";

    public function __construct(protected string $pergunta)
    {
    }



    // GETTERS E SETTERS
    public function pegaPergunta(): string
    {
        return $this->pergunta;
    }
    
    abstract public function responde(string $resposta): void;


    public function pegaResposta(): string 
    {
        return $this->resposta;
    }

}