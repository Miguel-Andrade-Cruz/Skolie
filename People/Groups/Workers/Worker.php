<?php

namespace Minuz\Skoolie\People\Groups\Workers;
use Minuz\Skoolie\People\People;


class Worker extends People
{
    public function __construct(string $name, protected string $id)
    {
        parent::__construct($name);
    }




}