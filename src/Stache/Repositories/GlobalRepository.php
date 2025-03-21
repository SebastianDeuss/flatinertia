<?php

namespace Flatinertia\Stache\Repositories;

use Statamic\Contracts\Globals\GlobalSet;
use Statamic\Contracts\Globals\GlobalRepository as Contract;
use Statamic\Stache\Repositories\GlobalRepository as Statamic;

class GlobalRepository extends Statamic implements Contract
{
    public static function bindings(): array
    {
        return [
            GlobalSet::class => \Flatinertia\Globals\GlobalSet::class,
        ];
    }
}
