<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Country;
use App\Service\RedisService;
use App\Service\StatisticRepositoryInterface;

/**
 * Class MessageRepository
 * @package App\Repository
 */
final class StatisticRepository implements StatisticRepositoryInterface
{
    private const STAT_KEY = 'statistics';

    /**
     * @var RedisService
     */
    private $redisService;

    /**
     * StatisticRepository constructor.
     * @param RedisService $redis
     */
    public function __construct(RedisService $redis)
    {
        $this->redisService = $redis;
    }

    /**
     * Increments amount of hits for the country
     * @param Country $country
     * @return int
     */
    public function stat(Country $country): int
    {
        return $this->redisService->getRedis()->hIncrBy(self::STAT_KEY, $country->getCountryCode(), 1);
    }

    /**
     * Receives amounts of hits for all countries
     * @return array
     */
    public function getStatistics(): array
    {
        return $this->redisService->getRedis()->hGetAll(self::STAT_KEY);
    }
}
