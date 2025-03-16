<?php

namespace Flatinertia;

use Statamic\Statamic;
use Flatinertia\Stache\Query\EntryQueryBuilder;
use Statamic\Contracts\Entries\EntryRepository as StatamicEntryRepository;
use Statamic\Contracts\Taxonomies\TermRepository as StatamicTermRepository;
use Statamic\Contracts\Taxonomies\TaxonomyRepository as StatamicTaxonomyRepository;
use Statamic\Contracts\Globals\GlobalRepository as StatamicGlobalRepository;
use Statamic\Contracts\Structures\NavigationRepository as StatamicNavRepository;
use Flatinertia\Stache\Repositories\TermRepository as FlattensTermRepository;
use Flatinertia\Stache\Repositories\TaxonomyRepository as FlattensTaxonomyRepository;
use Flatinertia\Stache\Repositories\EntryRepository as FlattensEntryRepository;
use Statamic\Contracts\Entries\CollectionRepository as StatamicCollectionRepository;
use Flatinertia\Stache\Repositories\GlobalRepository as FlattensGlobalRepository;
use Flatinertia\Stache\Repositories\NavigationRepository as FlattensNavRepository;
use Flatinertia\Stache\Repositories\CollectionRepository as FlattensCollectionRepository;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            EntryQueryBuilder::class,
            fn () => new EntryQueryBuilder(
                $this->app->make(\Statamic\Stache\Stache::class)->store('entries')
            )
        );

        Statamic::repository(
            StatamicCollectionRepository::class,
            FlattensCollectionRepository::class
        );

        Statamic::repository(
            StatamicEntryRepository::class,
            FlattensEntryRepository::class
        );

        Statamic::repository(
            StatamicGlobalRepository::class,
            FlattensGlobalRepository::class
        );

        Statamic::repository(
            StatamicNavRepository::class,
            FlattensNavRepository::class
        );

        Statamic::repository(
            StatamicTermRepository::class,
            FlattensTermRepository::class
        );

        Statamic::repository(
            StatamicTaxonomyRepository::class,
            FlattensTaxonomyRepository::class
        );
    }
}
