<?php

namespace Minuz\Skoolie\Data\Cache;

use Minuz\Skoolie\Content\{
    Assessments\Test,
    Assessments\Exercise
};

trait CacheBasics
{
    public function getFromCache(string $TIN): Test|Exercise
    {
        return $this->cache[$TIN];
    }





    public function removeFromCache(Test|Exercise $assessment): void 
    {
        $TIN = $assessment->getTIN();
        unset($this->cache[$TIN]);
    }


    public function addToRepository($assessment): void
    {
        $this->repository->push($assessment, "student");
        
    }

    public function getFromRepository($TIN): Test|Exercise
    {
        $assessment = $this->repository->pull($TIN);
        
        return $assessment; 
    }
}