<?php declare(strict_types=1);

namespace App\Service\Shapes;

class Circle extends Shape
{
    const SHAPE_NAME = 'circle';

    /**
     * @var float
     */
    private $radius;

    /**
     * @param float $radius
     */
    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    /**
     * @return float
     */
    public function getArea(): float
    {
        return M_PI * ($this->getRadius() ** 2);
    }

    /**
     * @return string
     */
    public function getParameterDescription(): string
    {
        return 'radius: '. $this->getRadius();
    }

    /**
     * @return float
     */
    private function getRadius(): float
    {
        return $this->radius;
    }
}