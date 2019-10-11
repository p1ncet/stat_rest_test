<?php

declare(strict_types=1);

namespace App\Tests\Service;

use PHPUnit\Framework\TestCase;
use App\Entity\Country;
use App\Service\StatisticService;
use App\Tests\Stubs\InMemoryStatisticsRepository;

class StatisticsServiceTest extends TestCase
{
    /**
     * @covers \App\Service\StatisticService::getStatistics
     */
    public function testGetStatistic(): void
    {
        $statisticRepository = new InMemoryStatisticsRepository();
        $statisticService = new StatisticService($statisticRepository);

        $countryEN = new Country('en');
        $statisticRepository->stat($countryEN);

        $countryCY = new Country('cy');
        $statisticRepository->stat($countryCY);
        $statisticRepository->stat($countryCY);

        $this->assertSame(['en' => 1, 'cy' => 2], $statisticService->getStatistics());
    }
}
