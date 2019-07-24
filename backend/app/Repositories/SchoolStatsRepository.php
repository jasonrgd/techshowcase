<?php

namespace App\Repositories;

use App\SchoolStats;

/**
 * Class SchoolStatsRepository
 * @package App\Repositories
 */
class SchoolStatsRepository implements SchoolStatsRepositoryInterface
{

    /**
     * @var SchoolStats
     */
    private $schoolStats;

    /**
     * SchoolStatsRepository constructor.
     * @param SchoolStats $schoolStats
     */
    public function __construct(SchoolStats $schoolStats)
    {
        $this->schoolStats = $schoolStats;
    }

    /**
     * @param $numberOfSchools
     * @return bool
     */
    public function storeStats($numberOfSchools) : bool
    {
        if (count($this->schoolStats->all()) > 0) {
            return $this->schoolStats->update([
                'number_of_schools' => $numberOfSchools,
                'id' => 1
            ]);
        } else {
            $this->schoolStats->number_of_schools = $numberOfSchools;
            return $this->schoolStats->save();
        }

    }
}
