<?php

namespace Minuz\Skolie\Controller;

use Minuz\Skolie\Controller\Controller;

class HomepageControlller implements Controller
{
    public function __construct()
    {

    }
    
    public function requestProcessor(): void
    {
        require_once __DIR__ . '/../../View/homepage.php';
    }
}