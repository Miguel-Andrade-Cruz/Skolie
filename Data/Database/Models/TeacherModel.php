<?php

namespace Minuz\Skoolie\Data\Database\RepositoriesModels;

use Minuz\Skoolie\Content\Assessments\{Test, Exercise};

interface TeacherModel
{
    public function getAssessmentsOfModel(string $TIN): array;

    public function getStudentAssessment(string $TIN_MR): Test|Exercise;

    public function getAssessmentsWich(
        int $grade,
        string $way = "HIGH"
    ): array;
}