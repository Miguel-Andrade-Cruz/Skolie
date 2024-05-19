<?php
namespace Minuz\Skolie\Model\Entities\Users;

use Minuz\Skolie\Data\repository\teacherRepository;
use Minuz\Skolie\Model\Entities\Users\Worker;

class Teacher extends Worker
{

    private $repository;

    public function __construct(string $name, string $EN)
    {
        parent::__construct($name, $EN);

        $this->repository = new teacherRepository($this->name, $this->EN);
    }


    public function createTest($form): void
    {
        $this->repository->newTest($form);
    }



    public function createQuestion($form): void
    {
        $this->repository->newQuestion($form);
    }


    public function deployTest($TIN): bool
    {
        return $this->repository->testAvaliable($TIN);
    }



    public function getModelTestFrames(): array|false
    {
        return $this->repository->pullModelTestFrames();
    }



    public function getSingleTest($TIN): array
    {
        return $this->repository->pullSingleTest($TIN);
    }


    public function testsFollowUp(): array
    {
        return $this->repository->testsFollowUp();
    }
}
