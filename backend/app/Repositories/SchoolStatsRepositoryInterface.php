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
     * @return bool
     */
    public function storeStats($numberOfSchools): bool;
}
