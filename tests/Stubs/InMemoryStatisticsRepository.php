<?php

declare(strict_types=1);

namespace App\Tests\Stubs;

use App\Entity\Country;
use App\Service\StatisticRepositoryInterface;

class InMemoryStatisticsRepository implements StatisticRepositoryInterface
{
    private $statistics = [];

    /**
     * Increments amount of hits for the country
     * @param Country $country
     * @return int
     */
    public function stat(Country $country): int
    {
        $countryCode = $country->getCountryCode();
        if (!isset($this->statistics[$countryCode])) {
            $this->statistics[$countryCode] = 0;
        }
        return ++$this->statistics[$countryCode];
    }

    /**
     * Receives amounts of hits for all countries
     * @return array
     */
    public function getStatistics(): array
    {
        return $this->statistics;
    }
}
