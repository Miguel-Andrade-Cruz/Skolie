<?php

namespace Minuz\Skolie\Controller;

use Minuz\Skolie\Controller\Controller;
require_once __DIR__ . "/../Model/Processors/LoginProcessor.php";


class LoginController implements Controller
{
    private $routes;
    public function __construct()
    {
        $this->routes = [
            "teacher" => "teacher-page",
            "student" => "student-page"
        ];
    }

    public function requestProcessor(): void 
    {
        $login = [
            "email" => $_POST["email"],
            "password" => $_POST["password"]
        ];

        if (! $routePointer = Login($login)) {
            header("Location: /?validate=false");
            exit();
        }

        $route = $this->routes[$routePointer];

        header("Location: /$route");
    }
}

