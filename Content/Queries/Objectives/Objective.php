<?php

namespace Minuz\Skoolie\Content\Queries\Objectives;

use Minuz\Skoolie\Content\{
    Queries\Query
};

abstract class Objective extends Query
{
    
    public function __construct(
        string $question,
        protected string $template,
    ) {
        parent:: __construct($question);
    }


    abstract public static function getAlternatives(): array;


    public function writeDown($answer): void
    {
        $questionType = get_class($this);
        
        $valid_answers = $questionType::pegaAlternativas();

        if (! in_array($answer, $valid_answers)) {
            echo "Resposta inválida para questão objetiva.";
            return;
        }
        
        $this->answer = $answer;
        
    }



    public function getTemplate(): string
    {
        return $this->template;
    }
    

}