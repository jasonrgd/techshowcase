<?php

namespace App\Providers;

use App\Library\Services\SchoolDataService;
use App\Repositories\SchoolRepository;
use App\Repositories\SchoolStatsRepository;
use App\SchoolStat;
use Illuminate\Cache\CacheManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $url = config('schooldata.url');
        $ttl = config('schooldata.cachettl');
        $cache = new CacheManager(app());

        $schoolStatsRepository = new SchoolStatsRepository(new SchoolStat());

        $schoolRepository = new SchoolRepository(new SchoolDataService($url), $schoolStatsRepository, $cache, $ttl);

        // injecting the instance of SchoolRepository when SchoolRepositoryInterface is passed as parameter
        $this->app->instance('App\Repositories\SchoolRepositoryInterface', $schoolRepository);
    }
}
