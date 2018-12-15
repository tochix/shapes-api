<?php /** @noinspection ReturnFalseInspection */
declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\Exceptions\InvalidParameterException;
use App\Service\Http\Request;
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
     * @var Request
     */
    private $request;

    /**
     * @param ShapesFactory $shapesFactory
     * @param Response $response
     * @param Request $request
     */
    public function __construct(ShapesFactory $shapesFactory, Response $response, Request $request)
    {
        $this->shapesFactory = $shapesFactory;
        $this->response = $response;
        $this->request = $request;
    }

    /**
     * @param string $radius
     * @throws InvalidParameterException
     */
    public function circle(string $radius)
    {

        if (false === filter_var($radius, FILTER_VALIDATE_FLOAT)) {
            throw InvalidParameterException::create('Please pass radius of circle as float or int.');
        }

        try {
            $circle = $this->getShapesFactory()->createCircle((float) $radius);
            $this->getResponse()->toJson($circle->describe());

        } catch (Throwable $ex) {
            header($ex->getMessage(), true, 500);
        }
    }

    /**
     * @throws InvalidParameterException
     */
    public function square()
    {
        $length = $this->getRequest()->getRequestParam(Request::METHOD_GET, 'length');
        if (false === filter_var($length, FILTER_VALIDATE_FLOAT)) {
            throw InvalidParameterException::create('Please pass length of square as float or int.');
        }

        try {
            $square = $this->getShapesFactory()->createSquare((float) $length);
            $this->getResponse()->toJson($square->describe());

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

    /**
     * @return Request
     */
    private function getRequest(): Request
    {
        return $this->request;
    }
}