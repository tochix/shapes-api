<?php declare(strict_types=1);

namespace App\Service\Shapes;

interface ShapesFactoryInterface
{
    /**
     * @param float $radius
     * @return ShapesAreaInterface
     */
    public function createCircle(float $radius): ShapesAreaInterface;
}