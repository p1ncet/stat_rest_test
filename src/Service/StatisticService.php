<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Country;

final class StatisticService
{
    /**
     * @var StatisticRepositoryInterface
     */
    private $statisticRepository;

    public function __construct(StatisticRepositoryInterface $statisticRepository)
    {
        $this->statisticRepository = $statisticRepository;
    }

    /**
     * Обновление статистики по стране
     * @param Country $country
     * @return int
     */
    public function stat(Country $country): int
    {
        return $this->statisticRepository->stat($country);
    }

    /**
     * Получение собранной статистики по всем странам
     * @return mixed
     */
    public function getStatistics()
    {
        return $this->statisticRepository->getStatistics();
    }
}
