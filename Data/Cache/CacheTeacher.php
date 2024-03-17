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
use Minuz\Skoolie\Data\Database\Repositories\TeacherRepository;
use Minuz\Skoolie\Data\Database\TeacherInterface;

class CacheTeacher implements Cache
{
    use CacheBasics;

    protected array $cache;
    protected array $correctionCache;
    protected $repository;
    public function __construct()
    {
        $this->repository = new TeacherRepository();
    }


    public function storeInCache($assessment, $MR): void 
    {
        $TIN = $assessment->getTIN();
        $this->cache[$TIN] = $assessment;
    }



    public function getAssessmentsWich(
        int $grade,
        string $way = "HIGHER"
    ): array {
        $assessments = $this->repository->getAssessmentsWich($grade, $way);
        return $assessments;
    }


    public function storeAnsweredAssessments(): void
    {
        
    }



    public function getStudentsAssessments(): array
    {
        return $this->correctionCache;
    }
}