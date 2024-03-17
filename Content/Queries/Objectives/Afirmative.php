<?php
namespace Minuz\Skoolie\Content\Queries\Objectives;
use Minuz\Skoolie\content\Queries\Objectives\Objective;




class Afirmative extends Objective
{


    protected static array $valid_answers = ["T", "F"];

    public function __construct(string $question, string $right_answer)
    {
        parent::__construct($question, $right_answer);
    }
    
    public static function getAlternatives(): array
    {
        return self::$valid_answers;
    }

    
}