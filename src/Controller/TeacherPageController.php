<?php

namespace Minuz\Skolie\Controller;

use Minuz\Skolie\Controller\Controller;
use Minuz\Skolie\Model\Entities\Users\Teacher;

session_start();

class TeacherPageController implements Controller
{
    public function __construct()
    {

    }

    public function requestProcessor(): void
    {
        $teacher = new Teacher($_SESSION["user"]["name"], $_SESSION["user"]["id"]);
        
        $_SESSION["models"] = $teacher->getMyModelTests();



        require_once __DIR__ . "/../../View/teacher.php";
    }
}