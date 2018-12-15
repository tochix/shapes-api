<?php declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\Exceptions\InvalidParameterException;
use App\Service\Http\Response;
use App\Service\Http\ResponseInterface;
use App\Service\Shapes\ShapesFactory;
use App\Service\Shapes\ShapesFactoryInterface;
use Throwable;

class Shapes
{
    /**
     * @var ShapesFactoryInterface
     */
    private $shapesFactory;

    /**
     * @var Response
     */
    private $response;

    /**
     * @param ShapesFactory $shapesFactory
     * @param Response $response
     */
    public function __construct(ShapesFactory $shapesFactory, Response $response)
    {
        $this->shapesFactory = $shapesFactory;
        $this->response = $response;
    }

    /**
     * @param string $radius
     * @throws InvalidParameterException
     */
    public function circle(string $radius)
    {
        /** @noinspection ReturnFalseInspection */
        if (false === filter_var($radius, FILTER_VALIDATE_FLOAT)) {
            throw InvalidParameterException::create('Please pass radius of circle as float or int.');
        }

        try {
            $resp = [
                'area' => $this->getShapesFactory()->createCircle((float) $radius)->getArea(),
                'type' => 'circle',
                'parameters' => 'radius:' . $radius
            ];
            $this->getResponse()->toJson($resp);
        } catch (Throwable $ex) {
            header($ex->getMessage(), true, 500);
        }
    }

    /**
     * @return ShapesFactoryInterface
     */
    private function getShapesFactory(): ShapesFactoryInterface
    {
        return $this->shapesFactory;
    }

    /**
     * @return ResponseInterface
     */
    private function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}