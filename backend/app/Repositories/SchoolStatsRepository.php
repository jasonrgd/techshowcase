<?php

namespace App\Repositories;

use App\SchoolStat;

/**
 * Class SchoolStatsRepository
 * @package App\Repositories
 */
class SchoolStatsRepository implements SchoolStatsRepositoryInterface
{

    /**
     * @var SchoolStat
     */
    private $schoolStats;

    /**
     * SchoolStatsRepository constructor.
     * @param SchoolStat $schoolStats
     */
    public function __construct(SchoolStat $schoolStats)
    {
        $this->schoolStats = $schoolStats;
    }

    /**
     * @param $numberOfSchools
     * @return bool
     */
    public function storeStats($numberOfSchools) : bool
    {
        // this can be stored in cache too but storing in database can have added value
        // i.e if we will continuosly store stats from each fetch unlike updating 1st record

        if (count($this->schoolStats->all()) > 0) {
            return $this->schoolStats->find(1)->update([
                'number_of_schools' => $numberOfSchools,
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        } else {
            $this->schoolStats->number_of_schools = $numberOfSchools;
            return $this->schoolStats->save();
        }

    }
}
