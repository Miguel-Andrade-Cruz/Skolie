<?php

namespace Minuz\Skolie\People\Groups\Classroom;

use Minuz\Skolie\People\Groups\Classroom\Student;

class Classroom
{
    protected array $students = [];
    
    public function __construct(public string $classroomTag)
    {
    }

    public function addStudent(Student $student)
    {
        $this->students[$student->MR] = $student;
    }
}