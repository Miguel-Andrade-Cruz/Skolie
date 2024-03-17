<?php

namespace Minuz\Skoolie\Data\Cache;

use Minuz\Skoolie\Content\{
    Assessments\Test,
    Assessments\Exercise
};

interface Cache
{
    public function removeFromcache(Test|Exercise $assessment): void;

    public function storeInCache(Test|Exercise $assessment, string $MR): void;

    public function addToRepository($assessment): void;
}