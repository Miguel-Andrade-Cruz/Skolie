<?php

namespace Minuz\Skoolie\People\Groups\Classroom;

use Minuz\Skoolie\People\Groups\Classroom\Student;

class classroom
{
    protected array $ClassroomStudents = [];
    
    public function __construct(public string $classroom)
    {
    }

    public function addStudent(Student $student)
    {
        $this->ClassroomStudents[$student->getMR()] = $student;
    }
}