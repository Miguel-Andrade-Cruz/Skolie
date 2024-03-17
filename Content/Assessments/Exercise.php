<?php
namespace Minuz\Skoolie\Content\Assessments;


class Exercise extends Assessment
{

    protected static int $maxQuestions = 5;
    
    public function __construct(
        string $Teacher,
        string $Class,
        string $Title,
        string $TIN
    ) {
        parent::__construct($Teacher, $Class, $Title, $TIN);
    }


    public static function getMaxQuestions(): int
    {
        return self::$maxQuestions;
    }
}