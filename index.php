<?php

require_once './vendor/autoload.php';

use Minuz\Skoolie\People\Groups\Classroom\classroom;
use Minuz\Skoolie\People\Groups\Classroom\Student;
use Minuz\Skoolie\People\Groups\Workers\Teacher;

define ("RAIZ", __DIR__);
define ("PROVA", "Minuz\\Skoolie\\Content\\Assessments\\Test");
define ("EXERCICIO", "Minuz\\Skoolie\\Content\\Assessments\\Exercise");

$terceiroB = new classroom("3B");


$rodrigo = new Student("Rodrigo", $terceiroB, "4459");


// $rodrigo->seeAllMyGrades();
$rodrigo->seeGradesWich(8, "HIGH");