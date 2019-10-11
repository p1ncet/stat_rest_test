<?php

declare(strict_types=1);

namespace App\Service;

use Redis;

final class RedisService
{
    /**
     * @var StatisticRepositoryInterface
     */
    private $redis;

    /**
     * RedisService constructor.
     * @param string $host
     * @param int $port
     * @param float $timeout
     * @param null $reserved
     * @param int $retry_interval
     * @param float $read_timeout
     */
    public function __construct(string $host, int $port = 6379, float $timeout = 0.0, $reserved = null, int $retry_interval = 0, float $read_timeout = 0.0)
    {
        $this->redis = new Redis();
        $this->redis->connect($host, $port, $timeout, $reserved, $retry_interval, $read_timeout);
    }

    /**
     * @return mixed
     */
    public function getRedis()
    {
        return $this->redis;
    }
}
