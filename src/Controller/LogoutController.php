<?php

namespace Minuz\Skolie\Controller;

use Minuz\Skolie\Controller\Controller;

class LogoutController implements Controller
{
    public function __construct()
    {

    }

    public function requestProcessor(): void
    {
        unset($_SESSION);
        session_destroy();
        header("Location: /");
    }
}