<?php

namespace Flatinertia\Stache\Repositories;

use Statamic\Contracts\Structures\Nav;
use Statamic\Contracts\Structures\NavigationRepository as Contract;
use Statamic\Stache\Repositories\NavigationRepository as Statamic;

class NavigationRepository extends Statamic implements Contract
{
    public static function bindings(): array
    {
        return [
            Nav::class => \Flatinertia\Structures\Nav::class,
        ];
    }
}
