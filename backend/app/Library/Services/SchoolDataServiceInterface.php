<?php

namespace App\Library\Services;

/**
 * Interface SchoolDataServiceInterface
 * @package App\Library\Services
 */
interface SchoolDataServiceInterface
{
    /**
     * @return array
     */
    public function fetchData(): array;
}
