<?php

namespace App\Repositories;

use App\Library\Services\SchoolDataServiceInterface;
use Illuminate\Cache\CacheManager;


/**
 * Class SchoolRepository
 * @package App\Repositories
 */
class SchoolRepository implements SchoolRepositoryInterface
{

    /**
     * @var CacheManager
     */
    private $cache;

    /**
     * @var SchoolDataServiceInterface
     */
    private $service;

    /**
     * @var SchoolStatsRepositoryInterface
     */
    private $stats;

    /**
     * @var integer
     */
    private $ttl;

    /**
     * SchoolRespository constructor.
     * @param SchoolDataServiceInterface $service
     */
    public function __construct(
        SchoolDataServiceInterface $service,
        SchoolStatsRepositoryInterface $stats,
        CacheManager $cache,
        $ttl = 60
    ) {
        $this->service = $service;
        $this->stats = $stats;
        $this->cache = $cache;
        $this->ttl = $ttl;
    }

    /**
     * Returns headcount from the service
     * @return array
     */
    public function getData(): array
    {
        if (!$this->cache->has('nsw_headcount_data')) {
            $data = $this->service->fetchData();
            $this->cache->put('nsw_headcount_data', $data, $this->ttl);
            $this->stats->storeStats(count($data));
        } else {
            $data = $this->cache->get('nsw_headcount_data');
        }

        return $data;
    }
}
