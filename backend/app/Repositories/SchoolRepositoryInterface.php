<?php

namespace App\Repositories;

/**
 * Interface SchoolRepositoryInterface
 * @package App\Repositories
 */
interface SchoolRepositoryInterface
{
    /**
     * Returns headcount from the service
     * @return array
     */
    public function getData(): array;
}
