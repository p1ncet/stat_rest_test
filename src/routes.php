<?php

use App\Controller;
use FastRoute\RouteCollector;

/**
 * Here are all our routes
 * @param RouteCollector $r
 */
return static function(RouteCollector $r) {
    $r->addRoute('GET', '/stat', [Controller\StatisticController::class, 'getStat']);
    $r->addRoute('PUT', '/stat/{countryName}', [Controller\StatisticController::class, 'stat']);
};