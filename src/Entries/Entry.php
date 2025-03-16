<?php

namespace Flatinertia\Entries;

use Illuminate\Support\Str;
use Statamic\Entries\Entry as Statamic;
use Flatinertia\Contracts\Resourceable;
use Flatinertia\Concerns\ResolvesNestedEntries;
use Flatinertia\Concerns\ResolvesStructuredData;
use Flatinertia\Http\Resourceable as HasResource;
use JsonSerializable;

class Entry extends Statamic implements Resourceable, JsonSerializable
{
    use HasResource;
    use ResolvesNestedEntries;
    use ResolvesStructuredData;

    public function resourceName()
    {
        $class = (string) Str::of($this->collection)
            ->singular()
            ->camel()
            ->ucfirst();

        return "Entries\\$class";
    }

    public function toResponse($request)
    {
        return $this->toResource()
            ->toResponse($request);
    }

    public function jsonSerialize()
    {
        return $this->toResource()->jsonSerialize();
    }
}
