<?php

namespace Flatinertia\Http;

use Flatinertia\Factories\Resource;

trait Resourceable
{
    public function toResource()
    {
        $resource = new Resource();

        return $resource->make($this);
    }
}
