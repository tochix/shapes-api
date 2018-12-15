<?php declare(strict_types=1);

namespace App\Config;

class RouteGroupItem
{
    /**
     * @var string
     */
    private $base;

    /**
     * @var string
     */
    private $route;

    /**
     * @var string
     */
    private $httpMethod;

    /**
     * @var string
     */
    private $controller;

    /**
     * @var string
     */
    private $controllerAction;

    /**
     * @param string $base
     * @param string $route
     * @param string $httpMethod
     * @param string $controller
     * @param string $controllerAction
     */
    public function __construct(
        string $base,
        string $route,
        string $httpMethod,
        string $controller,
        string $controllerAction
    )
    {
        $this->base = $base;
        $this->route = $route;
        $this->httpMethod = $httpMethod;
        $this->controller = $controller;
        $this->controllerAction = $controllerAction;
    }

    /**
     * @return string
     */
    public function getBase(): string
    {
        return $this->base;
    }

    /**
     * @return string
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    /**
     * @return string
     */
    public function getHttpMethod(): string
    {
        return $this->httpMethod;
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getControllerAction(): string
    {
        return $this->controllerAction;
    }
}