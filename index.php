<?php /** @noinspection PhpRedundantCatchClauseInspection */
declare(strict_types=1);

require 'vendor/autoload.php';

use App\Config\RoutesConfig;
use App\Controllers\Exceptions\ApiException;
use App\Service\Http\Request;
use App\Service\Http\Router;
use DI\Container;

$router = new Router(
    new RoutesConfig(),
    new Request(),
    new Container()
);

try {
    $router->dispatchRoute();
} catch (ApiException $ex) {
    $router->sendErrorResponse($ex->getMessage(), $ex->getCode());
} catch (Throwable $ex) {
    $router->sendErrorResponse($ex->getMessage(), 500);
}
