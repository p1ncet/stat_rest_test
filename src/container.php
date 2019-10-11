<?php

declare(strict_types=1);

use App\Repository\StatisticRepository;
use App\Service\RedisService;
use App\Service\StatisticRepositoryInterface;
use DI\ContainerBuilder;

require __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([
    StatisticRepositoryInterface::class => DI\autowire(StatisticRepository::class),
    RedisService::class => DI\autowire()->constructor(DI\get('redis.host')),
]);

try {
    $container = $containerBuilder->build();
    $container->set('redis.host', 'redis');
    return $container;
} catch (Exception $e) {
    throw new RuntimeException($e);
}