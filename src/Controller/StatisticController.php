<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Country;
use App\Service\StatisticService;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Statistic controller.
 */
class StatisticController
{
    private $statisticService;

    /**
     * StatisticController constructor.
     * @param $statisticService
     */
    public function __construct(StatisticService $statisticService)
    {
        $this->statisticService = $statisticService;
    }

    /**
     * Updates statistic for the specified country
     * @param string $countryCode
     * @return JsonResponse
     */
    public function stat(string $countryCode): JsonResponse
    {
        $country = new Country($countryCode);
        $hits = $this->statisticService->stat($country);
        return new JsonResponse([$countryCode => $hits], JsonResponse::HTTP_OK);
    }

    /**
     * Receives and returns statistic for all countries
     * @return JsonResponse
     */
    public function getStat(): JsonResponse
    {
        $statistics = $this->statisticService->getStatistics();
        return new JsonResponse($statistics, JsonResponse::HTTP_OK);
    }
}
