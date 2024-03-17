<?php

namespace Minuz\Skoolie\Data\Database\Models;

interface StudentModel
{
    public function getAllMyGrades(string $MR): array;

    public function getGradesWich(
        string $MR,
        int $grade,
        string $way = "HIGH"
    ): array;
}