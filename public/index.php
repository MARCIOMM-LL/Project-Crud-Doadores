<?php

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

require __DIR__ . '/../vendor/autoload.php';

$path = $_SERVER['PATH_INFO'] ?? '/';
$rotas = require __DIR__ . '/../config/rotas.php';

if ($path === '/') {
    header('Location: /listar-doadores');
    exit();
}

if (!isset($rotas[$path])) {
    http_response_code(404);
    exit();
}

session_start();

$controllerClass = $rotas[$path];

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$serverRequest = $creator->fromGlobals();

/** @var ContainerInterface $container */
$container = require __DIR__ . '/../config/dependencias.php';

/** @var RequestHandlerInterface $controllerInstance */
$controllerInstance = $container->get($controllerClass);

$response = $controllerInstance->handle($serverRequest);

foreach ($response->getHeaders() as $header => $valores) {
    foreach ($valores as $value) {
        header(sprintf('%s: %s', $header, $value), false);
    }
}
echo $response->getBody();