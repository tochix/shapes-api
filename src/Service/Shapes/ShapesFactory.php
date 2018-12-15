<?php declare(strict_types=1);

namespace App\Service\Shapes;

class ShapesFactory implements ShapesFactoryInterface
{
    /**
     * @param float $radius
     * @return ShapesAreaInterface
     */
    public function createCircle(float $radius): ShapesAreaInterface
    {
        return new Circle($radius);
    }
}