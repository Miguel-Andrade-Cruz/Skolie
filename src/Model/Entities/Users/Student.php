<?php

namespace Minuz\Skolie\Model\Entities\Users;

use Minuz\Skolie\Model\Entities\Users\People;

use Minuz\Skolie\Data\{
    repository\studentRepository

};

class Student extends People
{
    protected studentRepository $repository;
    public readonly string $classroom;

    public function __construct(
        string $name,
        public readonly string $MR
    ) {
        parent::__construct($name);
        $this->repository = new studentRepository($this->name, $this->MR);
    }



    public function viewPendantTests(): void
    {
        $this->repository->pullPendantTests($this->classroom);
    }
}