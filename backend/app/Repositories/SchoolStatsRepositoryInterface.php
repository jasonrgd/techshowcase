<?php

namespace App\Respositories;


interface SchoolStatsRepositoryInterface
{
    public function storeStats($numberOfSchools, $lastFetched);
}
