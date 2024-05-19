<?php

namespace Minuz\Skolie\Data\repository;
use Minuz\Skolie\Data\Repository;
use Minuz\Skolie\Infrastructure\ConnectionCreator;

class studentRepository extends Repository
{
    public readonly string $MR;

    public function __construct($name, $MR)
    {
        parent::__construct($name);
        $this->MR = $MR;
    }    


    public function pullPendantTests($classroom)
    {
        $order = "
        SELECT
            tests.title
        FROM
            school_database.model_tests tests
        WHERE is_done = 'Disponível'
        AND classroom = '$classroom';
        ";
    }


    public function sendAnswer($answers): void
    {

    }



}