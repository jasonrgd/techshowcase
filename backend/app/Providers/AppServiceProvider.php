<?php

namespace App\Providers;

use App\Library\Services\SchoolDataService;
use App\Repositories\SchoolRepository;
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
        $schoolRepository  = new SchoolRepository(new SchoolDataService($url), $cache, $ttl);
        $this->app->instance('App\Repositories\SchoolRepositoryInterface', $schoolRepository);
    }
}
