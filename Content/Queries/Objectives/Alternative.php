<?php
namespace Minuz\Skoolie\Content\Queries\Objectives;
use Minuz\Skoolie\Content\Queries\Objectives\Objective;





class Alternative extends Objective
{

    static protected array $valid_answers = ["A", "B", "C", "D", "E"];
    
    public function __construct(string $question, string $right_answer)
    {
        parent::__construct($question, $right_answer);
    }
    
    public static function getAlternatives(): array
    {
        return self::$valid_answers;

    }
}