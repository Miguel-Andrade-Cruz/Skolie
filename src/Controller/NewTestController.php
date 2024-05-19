<?php

namespace Minuz\Skolie\Controller;


class NewTestController implements Controller
{
    public function requestProcessor(): void
    {
        require_once __DIR__ . "/../../View/new-test-header.php";
    }
}