<?php

namespace Tests\Unit;

use App\Library\Services\SchoolDataServiceInterface;
use App\Repositories\SchoolRepository;
use App\Repositories\SchoolStatsRepositoryInterface;
use Illuminate\Cache\CacheManager;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

    class SchoolRepositoryTest extends TestCase
    {
        /**
         *
         *
         * @return void
         */
        public function testReturnsDataFromServiceIfCacheisEmpty()
        {
            $schoolDataService = $this->mock(SchoolDataServiceInterface::class, function ($mock) {
                $mock->shouldReceive('fetchData')->once()->andReturn(array());
            });

            $schoolStats = $this->mock(SchoolStatsRepositoryInterface::class, function ($mock) {
                $mock->shouldReceive('storeStats')->once()->andReturn(true);
            });

            $schoolRepository = new SchoolRepository($schoolDataService, $schoolStats, new CacheManager(app()), 60);

            $data = $schoolRepository->getData();

            $this->assertEquals(array(), $data);
        }

        public function testReturnsDataFromCacheIfCacheisNotEmpty()
        {
            $schoolDataService = $this->mock(SchoolDataServiceInterface::class, function ($mock) {
                $mock->shouldReceive('fetchData')->andReturn(array('some_data'));
            });

            $schoolStats = $this->mock(SchoolStatsRepositoryInterface::class, function ($mock) {
                $mock->shouldReceive('storeStats')->andReturn(true);
            });

            $cacheManager = $this->mock(CacheManager::class, function ($mock){
                $mock->shouldAllowMockingProtectedMethods();
                $mock->shouldReceive('has')->once()->andReturn(true);
                $mock->shouldReceive('get')->andReturn(array('cached_data'));
            });

            $schoolRepository = new SchoolRepository($schoolDataService, $schoolStats, $cacheManager, 60);

            $data = $schoolRepository->getData();

            $this->assertEquals(array('cached_data'), $data);
        }

    }
