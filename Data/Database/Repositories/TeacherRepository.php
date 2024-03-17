<?php

namespace Minuz\Skoolie\Data\Database\Repositories;

use Minuz\Skoolie\Content\{
    Assessments\Test,
    Assessments\Exercise
};

use Minuz\Skoolie\Data\Database\Models\DataInterface;
use Minuz\Skoolie\Data\Database\RepositoriesModels\TeacherModel;
use PDO;

class TeacherRepository extends DataInterface implements TeacherModel
{
    public function getAssessmentsOfModel(string $TIN): array
    {
        $this->cache->
    }


    public function getStudentAssessment(string $TIN_MR): Test|Exercise
    {
        $order = "SELECT * FROM "
    }

    public function getAssessmentsWich(
        int $grade,
        string $way = "HIGH"
    ): array {
        
        $direction = $way === "LOW" ? "<=" : ">=";
        $order = "SELECT Name, Grade FROM Student_Assessmetns WHERE Grade $direction $grade;";
        $assessmentsArray = $this->pdo->query($order)->fetchAll(PDO::FETCH_ASSOC);

        return $assessmentsArray;
    }
}