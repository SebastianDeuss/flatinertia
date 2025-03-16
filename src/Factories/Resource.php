<?php

namespace Flatinertia\Factories;

use Flatinertia\Entries\Entry;
use Flatinertia\Http\Resources;
use Flatinertia\Taxonomies\Term;
use Flatinertia\Entries\Collection;
use Flatinertia\Contracts\Resourceable;
use Flatinertia\Globals\GlobalSet;
use Flatinertia\Taxonomies\LocalizedTerm;
use Flatinertia\Taxonomies\Taxonomy;

class Resource
{
    public static $namespace = 'App\Http\Resources';

    public function namespace($namespace)
    {
        self::$namespace = $namespace;
    }

    public function make(Resourceable $value)
    {
        $class = $this->resolveNamespace($value);

        return new $class($value);
    }

    protected function resolveNamespace($value)
    {
        if (class_exists($class = self::$namespace . '\\' . $value->resourceName())) {
            return $class;
        }

        if ($value instanceof Entry) {
            return Resources\EntryResource::class;
        }

        if ($value instanceof Collection) {
            return Resources\CollectionResource::class;
        }

        if ($value instanceof GlobalSet) {
            return Resources\GlobalSetResource::class;
        }

        if ($value instanceof Taxonomy) {
            return Resources\TaxonomyResource::class;
        }

        if ($value instanceof Term || $value instanceof LocalizedTerm) {
            return Resources\TermResource::class;
        }

        return Resources\Resource::class;
    }
}
