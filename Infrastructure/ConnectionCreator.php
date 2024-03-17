<?php

namespace Minuz\Skoolie\Infrastructure;

use PDO;


class ConnectionCreator
{
    public static function connect()
    {
        $db = "School_Assessments";

        $connection = new PDO("mysql:host=localhost;dbname=$db", "root", "1164");
        return $connection;
    }
}
