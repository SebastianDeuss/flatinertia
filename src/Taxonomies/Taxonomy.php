<?php

namespace Flatinertia\Taxonomies;

use Illuminate\Support\Str;
use Flatinertia\Contracts\Resourceable;
use Statamic\Taxonomies\Taxonomy as Statamic;
use Flatinertia\Http\Resourceable as HasResource;
use Statamic\Contracts\Taxonomies\Taxonomy as Contract;

class Taxonomy extends Statamic implements Contract, Resourceable
{
    use HasResource;

    public function resourceName()
    {
        $class = (string) Str::of($this->handle())
            ->camel()
            ->ucfirst();

        return "Taxonomies\\$class";
    }
}
