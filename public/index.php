<?php

declare(strict_types=1);

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

require dirname(__DIR__).'/vendor/autoload.php';

try {
    /** @var DI\Container $container */
    $container = require __DIR__ . '/../src/container.php';

    $dispatcher = FastRoute\simpleDispatcher(require __DIR__ . '/../src/routes.php');

    $request = Request::createFromGlobals();

// Fetch method and URI from somewhere
    $httpMethod = $request->getMethod();
    $uri = $request->getRequestUri();

// Strip query string (?foo=bar) and decode URI
    if (false !== $pos = strpos($uri, '?')) {
        $uri = substr($uri, 0, $pos);
    }
    $uri = rawurldecode($uri);

    $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
    switch ($routeInfo[0]) {
        case FastRoute\Dispatcher::NOT_FOUND:
            $response = new JsonResponse(['Not Found'], JsonResponse::HTTP_NOT_FOUND);
            $response->send();
            break;
        case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
            $response = new JsonResponse('Method Not Allowed', JsonResponse::HTTP_METHOD_NOT_ALLOWED);
            $response->send();
            break;
        case FastRoute\Dispatcher::FOUND:
            $handler = $routeInfo[1];
            $parameters = $routeInfo[2];
            /** @var JsonResponse $response */
//            $response = $container->call($handler, $parameters);
            $response = call_user_func_array([$container->get($handler[0]), $handler[1]], $parameters);
            $response->send();
            break;
    }
} catch (Throwable $e) {
//    $result = [
//        'error' => $e->getMessage(),
//        'file' => $e->getFile(),
//        'line' => $e->getLine(),
//    ];
    $result = ['error' => 'Internal Server Error'];
    $response = new JsonResponse($result, JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    $response->send();
}