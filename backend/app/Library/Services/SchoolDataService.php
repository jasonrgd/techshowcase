<?php

namespace App\Library\Services;

/**
 * Class SchoolDataService
 * @package App\Library\Services
 */
class SchoolDataService implements SchoolDataServiceInterface
{
    /**
     * @var string
     */
    private $url;

    /**
     * SchoolDataService constructor.
     * @param string $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * fetches the json data from the url and stores in associative array
     *
     * @return array
     */
    public function fetchData(): array
    {
        return json_decode(file_get_contents($this->url), true);
    }
}
