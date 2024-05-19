<?php

namespace Minuz\Skolie\Model\Entities\Users;

abstract class People
{
    public function __construct(
        public readonly string $name
    ) {
        
    }

    
}
