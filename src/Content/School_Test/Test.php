<?php

namespace Minuz\Skolie\Model\Entities;

use Minuz\Skolie\Content\Question\Afirmative;
use Minuz\Skolie\Content\Question\Alternative;

class Test
{

    protected int $grade;
    protected $questionArray;
    public int $numOfQuestions = 0;

    public function __construct(
        public readonly string $TIN,
        public readonly string $teacher,
        public readonly string $title,
        public readonly string $classroom
    ) {

    }


    public function addQuestion($questionType, $question, $template): void
    {
        $this->numOfQuestions++;
        
        $newQuestion = new $questionType($question, $template);
        $this->questionArray[$this->numOfQuestions] = $newQuestion;

        return;
    }

    

    public function removeQuestion($questionNumber): void
    {
        $this->numOfQuestions--;
        unset($this->questionArray[$questionNumber]);
        
        return;
    }

}