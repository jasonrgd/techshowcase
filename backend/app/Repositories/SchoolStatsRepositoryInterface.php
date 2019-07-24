<?php

namespace App\Repositories;

/**
 * Interface SchoolStatsRepositoryInterface
 * @package App\Repositories
 */
interface SchoolStatsRepositoryInterface
{
    /**
     * @param $numberOfSchools
     * @return mixed
     */
    public function storeStats($numberOfSchools);
}
