<?php

namespace App\Respositories;

use App\Library\Services\SchoolDataServiceInterface;
use Illuminate\Cache\CacheManager;


/**
 * Class SchoolRespository
 * @package App\Respositories
 */
class SchoolRespository implements SchoolRespositoryInterface
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
     * @var integer
     */
    private $ttl;

    /**
     * SchoolRespository constructor.
     * @param SchoolDataServiceInterface $service
     */
    public function __construct(SchoolDataServiceInterface $service, CacheManager $cache, $ttl = 60)
    {
        $this->service = $service;
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
        } else {
            $data = $this->cache->get('nsw_headcount_data');
        }

        return $data;
    }
}
