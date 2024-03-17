<?php
namespace Minuz\Skoolie\People\Groups\Workers;

use Minuz\Skoolie\Content\Assessments\{Test, Exercise};
use Minuz\Skoolie\Data\Cache\CacheTeacher;
use Minuz\Skoolie\People\Groups\Classroom\Classroom;
use Minuz\Skoolie\People\Groups\Workers\Worker;

class Teacher extends Worker
{

    protected $cache;

    public function __construct(string $name, string $id, protected Classroom $classroom)
    {
        parent::__construct($name, $id);
        $this->cache = new CacheTeacher();
    }



    protected function getFromCache(string $TIN): Test|Exercise
    {
        return $this->cache->getFromCache($TIN);
    }



    public function addQuestionsAt(string $TIN, array $questions): void
    {
        $assessment  = $this->getFromCache($TIN);
        $assessment->addQuestions($questions);
        
    }



    public function removeQuestionsFrom(string $TIN, array $enumeratedQuestions): void 
    {
        $assessment = $this->getFromCache($TIN);
        $assessment->removeQuestions($enumeratedQuestions);
    }



    public function viewAssessments(array $TINs): void 
    {
        foreach ($TINs as $TIN) {
            $assessment = $this->cache->getFromCache($TIN);
            $assessment->visualizeAssessment("teacher");
        }
    }



    public function setUpAssessment(
        string $assessmentType,
        string $TIN,
        string $title,
        string $classroom,
        array|false $questions = false
    ): void {
        // Nova prova (vazia) adicionada ao cache
        $this->cache->storeInCache(new $assessmentType($this->name, $classroom, $title, $TIN));
        
        // Busca e adiciona as questões colocadas
        if (is_array($questions)) {
            $this->addQuestionsAt($TIN, $questions);
        }

        return;
    }


    public function correction($TIN): void
    {
        
    }


    

}