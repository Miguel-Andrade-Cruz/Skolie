<?php

namespace Minuz\Skolie\Controller;

use Minuz\Skolie\Controller\Controller;

class CreateTestRedirectController implements Controller
{
    public function requestProcessor(): void
    {
        require_once __DIR__ . "/../../View/new-test-header.php";
    }
}