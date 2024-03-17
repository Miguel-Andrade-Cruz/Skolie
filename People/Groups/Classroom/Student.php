<?php

namespace Minuz\Skoolie\People\Groups\Classroom;

use Minuz\Skoolie\Data\
    {Cache\CacheStudent};

use Minuz\Skoolie\
    {People\People};

use Minuz\Skoolie\Content\Assessments\{Test, Exercise};

class Student extends People
{
    protected $cache;

    public function __construct(string $name, protected Classroom $classroom, protected string $MR)
    {
        parent::__construct($name);
        $classroom->addStudent($this);
        
        $this->cache = new CacheStudent();
    }



    protected function getAssessment(string $TIN): Test|Exercise
    {
        $MR = $this->getMR();
        $TIN = str_replace("XXXX", $MR, $TIN);
        
        $assessment = $this->cache->getFromCache($TIN);
        
        return $assessment;
    }



    public function respondAssessment(array $enumeratedAnswers, string $TIN): void
    {
        $assessment = $this->getAssessment($TIN);

        foreach ($enumeratedAnswers as $number => $answer) {
            $assessment->respond($number, $answer);
        }
    }
    
    
    public function sendAssessment(string $TIN): void
    {
        $assessment = [$this->getAssessment($TIN)];
        $this->cache->sendToCorrection($assessment);
    }



    public function seeAllMyGrades(): void
    {
        $message = "Essas são suas notas de todas as provas:" . PHP_EOL;
        $results = $this->cache->getAllGrades($this->getMR());

        echo $message . $results;
        
        return;
    }



    public function seeGradesWich(int $grade, string $way = "HIGH"): void
    {
        $condition = $way === "LOW" ? "abaixo" : "acima";

        $header = "Essas são as suas notas $condition de $grade:" . PHP_EOL;
        $message = "";

        $message = $this->cache->getGradesWich($this->getMR(), $grade, $way);

        echo $header . $message;
        return;
    }



    public function viewAsessment(string $TIN): void
    {
        $assessment = $this->cache->getFromCache($TIN);
        $assessment->visualizeAssessment("student"); 
    }



    public function getMR(): string 
    {
        return $this->MR;
    }

    public function getName(): string 
    {
        return $this->name;
    }
}