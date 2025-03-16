<?php

namespace Flatinertia\Stache\Repositories;

use Statamic\Contracts\Taxonomies\Taxonomy;
use Statamic\Stache\Repositories\TaxonomyRepository as Statamic;
use Statamic\Contracts\Taxonomies\TaxonomyRepository as Contract;

class TaxonomyRepository extends Statamic implements Contract
{
    public static function bindings(): array
    {
        return [
            Taxonomy::class => \Flatinertia\Taxonomies\Taxonomy::class,
        ];
    }
}
