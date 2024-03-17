<?php

namespace Minuz\Skoolie\Data\Cache;

use Minuz\Skoolie\Data\{
    Cache\Cache
};

use Minuz\Skoolie\Data\{
    Database\FileInterface
};

use Minuz\Skoolie\Data\{
    Cache\CacheBasics
};
use Minuz\Skoolie\Data\Database\Repositories\StudentRepository;

class CacheStudent implements Cache
{
    use CacheBasics;

    protected array $cache;
    protected $repository;

    public function __construct()
    {
        $this->repository = new StudentRepository();
    }


    public function storeInCache($assessment, $MR): void 
    {
        $assessment->setcomplementTIN($MR);
        $TIN = $assessment->getTIN();
        $this->cache[$TIN] = $assessment;
    }


    public function getAllGrades(string $MR): string
    {
        $results = $this->repository->getAllMyGrades($MR);

        $format = "";
        foreach ($results as $title => $grade) {
            $format .= "$title: Nota $grade." . PHP_EOL;
        }


        return $format;
    }



    public function getGradesWich(string $MR, int $grade, string $way = "HIGH"): string
    {
        $gradesArray = $this->repository->getGradesWich($MR, $grade, $way);

        $format = "";
        foreach ($gradesArray as $title => $grade) {
            $format .= "$title: Nota $grade." . PHP_EOL;
        }

        return $format;
    }



    public function sendToCorrection(): void
    {
        
    }
}