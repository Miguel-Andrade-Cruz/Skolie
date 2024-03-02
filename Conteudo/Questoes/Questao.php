<?php

namespace Minuz\Skoolie\Conteudo\Questoes;

abstract class Questao
{
    protected string $resposta  = "Preencher";

    public function __construct(protected string $pergunta)
    {
    }



    // GETTERS E SETTERS
    public function pegaPergunta(): string
    {
        return $this->pergunta . PHP_EOL;
    }
    
    abstract public function responder(string $resposta): void;


    public function verResposta(): string 
    {
        return $this->resposta;
    }

 
    
}