<?php declare(strict_types=1);

namespace App\Service\Shapes;

class ShapesFactory implements ShapesFactoryInterface
{
    /**
     * @param float $radius
     * @return ShapeInterface
     */
    public function createCircle(float $radius): ShapeInterface
    {
        return new Circle($radius);
    }
}