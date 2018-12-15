<?php declare(strict_types=1);

namespace App\Service\Shapes;

class Circle implements ShapesAreaInterface
{
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
        return M_PI * ($this->radius ** 2);
    }
}