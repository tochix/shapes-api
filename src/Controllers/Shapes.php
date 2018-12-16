<?php declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\Exceptions\InvalidParameterException;
use App\Service\Http\Request;
use App\Service\Http\Response;
use App\Service\Shapes\ShapesFactory;
use App\Service\Shapes\ShapesFactoryInterface;

class Shapes extends BaseController
{
    /**
     * @var ShapesFactoryInterface
     */
    private $shapesFactory;

    /**
     * @param ShapesFactory $shapesFactory
     * @param Response $response
     * @param Request $request
     */
    public function __construct(ShapesFactory $shapesFactory, Response $response, Request $request)
    {
        $this->shapesFactory = $shapesFactory;
        parent::__construct($response, $request);
    }

    /**
     * @param string $radius
     * @throws InvalidParameterException
     */
    public function circle(string $radius)
    {
        $validationMsg = 'Please pass radius of circle as float or int.';
        $this->filterValidateType($radius, FILTER_VALIDATE_FLOAT, $validationMsg);

        $circle = $this->getShapesFactory()->createCircle((float) $radius);
        $this->getResponse()->toJson($circle->describe());
    }

    /**
     * @throws InvalidParameterException
     */
    public function square()
    {
        $validationMsg = 'Please pass length of square as float or int.';
        $length = $this->getRequest()->getRequestParam(Request::METHOD_GET, 'length');
        $this->filterValidateType($length, FILTER_VALIDATE_FLOAT, $validationMsg);

        $square = $this->getShapesFactory()->createSquare((float) $length);
        $this->getResponse()->toJson($square->describe());
    }

    /**
     * @throws InvalidParameterException
     */
    public function rectangle()
    {
        $lengthValidationMsg = 'Please pass length of rectangle as float or int.';
        $widthValidationMsg = 'Please pass width of rectangle as float or int.';

        $length = $this->getRequest()->getRequestParam(Request::METHOD_POST, 'length');
        $width = $this->getRequest()->getRequestParam(Request::METHOD_POST, 'width');

        $this->filterValidateType($length, FILTER_VALIDATE_FLOAT, $lengthValidationMsg);
        $this->filterValidateType($width, FILTER_VALIDATE_FLOAT, $widthValidationMsg);

        $rectangle = $this->getShapesFactory()->createRectangle((float) $length, (float) $width);
        $this->getResponse()->toJson($rectangle->describe());
    }

    /**
     * @return ShapesFactoryInterface
     */
    private function getShapesFactory(): ShapesFactoryInterface
    {
        return $this->shapesFactory;
    }
}