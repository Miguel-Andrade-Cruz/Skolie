<?php

namespace Minuz\Skoolie\Data\Database\Models;

use Minuz\Skoolie\Infrastructure\ConnectionCreator;

abstract class DataInterface
{
    protected $pdo;
    
    public function __construct()
    {
        $this->pdo = ConnectionCreator::connect();
    }
}