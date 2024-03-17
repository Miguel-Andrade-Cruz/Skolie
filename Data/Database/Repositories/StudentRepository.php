<?php

namespace Minuz\Skoolie\Data\Database\Repositories;

use Minuz\Skoolie\Data\Database\Models\DataInterface;
use Minuz\Skoolie\Data\Database\Models\StudentModel;
use PDO;

class StudentRepository extends DataInterface implements StudentModel
{
    public function getAllMyGrades(string $MR): array
    {
        $regex = "$MR$";
        $order =
        "SELECT Title, Grade FROM Student_Assessments WHERE TIN REGEXP '$regex';";

        $resultsArray = $this->pdo->query($order)->fetchAll(PDO::FETCH_ASSOC);

        $titleGradeArray = [];
        foreach ($resultsArray as $pair) {
            $titleGradeArray[$pair["Title"]] = $pair["Grade"];
        }

        return $titleGradeArray;
    }


    public function getGradesWich(
        string $MR,
        int $grade,
        string $way = 'HIGH'
    ): array {
        
        $regex = "$MR$";
        $direction = $way === "LOW" ? "<=" : ">=";

        $order = 
        "SELECT Title, Grade FROM Student_Assessments
        WHERE TIN REGEXP '$regex' AND Grade $direction $grade";
        
        $resultsArray = $this->pdo->query($order)->fetchAll(PDO::FETCH_ASSOC);

        $titleGradeArray = [];
        foreach ($resultsArray as $pair) {
            $titleGradeArray[$pair["Title"]] = $pair["Grade"];
        }
        return $titleGradeArray;
    }
}