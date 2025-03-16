<?php

namespace Flatinertia\Contracts;

interface Resourceable
{
    public function resourceName();

    public function toResource();
}
