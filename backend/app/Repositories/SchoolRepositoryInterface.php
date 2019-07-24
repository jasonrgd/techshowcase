<?php

namespace App\Respositories;

/**
 * Interface SchoolRespositoryInterface
 * @package App\Respositories
 */
interface SchoolRepositoryInterface
{
    /**
     * Returns headcount from the service
     * @return array
     */
    public function getData(): array;
}
