<?php

namespace Minuz\Skolie\Data;

use Minuz\Skolie\Infrastructure\ConnectionCreator;
use PDO;

abstract class Repository
{
    public readonly string $name;

    public readonly string $database;
    protected PDO $pdo;

    public function __construct($name)
    {
        $this->name = $name;

        $this->pdo = ConnectionCreator::connect();
    }
}