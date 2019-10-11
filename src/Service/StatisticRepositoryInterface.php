<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Country;

/**
 * Interface StatisticRepositoryInterface
 * @package App\Service
 */
interface StatisticRepositoryInterface
{
    /**
     * Increments amount of hits for the country
     * @param Country $country
     * @return int
     */
    public function stat(Country $country): int;

    /**
     * Receives amounts of hits for all countries
     * @return array
     */
    public function getStatistics(): array;
}
