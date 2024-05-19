<?php

namespace Minuz\Skolie\Model\Entities\Users;

use Minuz\Skolie\Model\Entities\Users\People;


class Worker extends People
{
    public function __construct(string $name, public readonly string $EN)
    {
        parent::__construct($name);
    }




}