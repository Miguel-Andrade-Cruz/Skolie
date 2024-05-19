<?php

namespace Minuz\Skolie\Infrastructure;

use PDO;


class ConnectionCreator
{
    public static function connect()
    {
        $db = "school_database";
        $connection = new PDO("mysql:host=localhost;dbname=$db", "root", "1164");

        return $connection;
    }
}
