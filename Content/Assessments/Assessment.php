<?php
namespace Minuz\Skoolie\Content\Assessments;

use Minuz\Skoolie\Content\Queries\Objectives\{Afirmative, Alternative};
use Minuz\Skoolie\Content\Queries\Objectives\Objective;


abstract class Assessment
{
    protected int $numberOfQuestions = 0;
    protected static ?int $questionMax;
    protected int $answeredQuestions = 0;
    
    public function __construct(
        protected string $teacher,
        protected string $classroom,
        protected string $title,
        protected string $TIN,
        protected int|string $grade = "Em correção...",
        protected array $quiz = [],
        protected string $name = "Coloque o nome"
    ) {
        $this->answeredQuestions = $this->countAnsweredQuestions();
    }



    protected function countAnsweredQuestions(): int 
    {
        $counting = function ($carry, $question) {
            $isAnswered = $question->getAnswer() !== null ? 1 : 0;
            return $carry += $isAnswered;
        };
        
        $answeredQuestions = array_reduce($this->quiz, $counting, 0);

        return $answeredQuestions;
    }



    public function visualizeAssessment(string $user = "student"): void
    {
        $header = "{$this->classroom}, Prof. {$this->teacher}, Código NIP: {$this->TIN}. Nome: {$this->name}" . PHP_EOL;
        $quiz = "Avaliação: {$this->title}" . PHP_EOL ;

        $isObjective = fn ($question): bool => $question instanceof Objective ? true : false;


        $forTeachers = fn ($question): string => "{$question->getQuestion()}: {$question->getTemplate()}"; 
        $forStudents = fn ($question): string => "{$question->getQuestion()}: {$question->getAnswer()}";
        
        foreach ($this->quiz as $question) {
            if (! $isObjective($question)) {
                continue;
            }

            if ($user === "teacher") {
                $quiz .= $forTeachers($question);
            }

            $quiz .= $forStudents($question);
        }

        echo $header . $quiz;
    }



    public function addQuestions(array $questions): void 
    {
        $assessmentType = get_class($this);
        $totalQuestions = $assessmentType::getMaxQuestions();

        $actualQuantity = $this->getNumberOfQuestions();
        $remainingQuantity = $totalQuestions - $actualQuantity;

        $remainingQuestions = array_slice($questions, 0, $remainingQuantity);
        
        foreach($remainingQuestions as $question) {
            $this->numberOfQuestions++;
            $this->quiz[$this->numberOfQuestions] = $question;
        }
    }



    public function removeQuestions(array $numbers): void
    {
        foreach($numbers as $number) {
            unset($this->quiz[$number]);
            $this->numberOfQuestions--;
        }
    }



    public function respond(int $number, string $answer): void
    {
        $questionToAnswer = $this->quiz[$number];
        $questionToAnswer->writeDown($answer);
    }



    public function setGrade(int $grade): void 
    {
        $this->grade = $grade;
    }

    public function setName(string $name): void 
    {
        $this->name = $name;
    }

    public function setcomplementTIN($MR): void
    {
        str_replace("XXXX", $MR, $this->TIN);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getGrade(): int|string
    {
        return $this->grade;
    }

    public function getTIN(): string
    {
        return $this->TIN;
    }

    public function getNumberOfQuestions(): int 
    {
        return $this->numberOfQuestions;
    }

    public function getTitle(): string 
    {
        return $this->title;
    }

    public function getClassroom(): string
    {
        return $this->classroom;
    }

    public function getAnsweredQuestions(): int 
    {
        return $this->answeredQuestions;
    }

}