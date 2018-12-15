<?php declare(strict_types=1);

namespace App\Service\Shapes;

interface ShapesFactoryInterface
{
    /**
     * @param float $radius
     * @return ShapeInterface
     */
    public function createCircle(float $radius): ShapeInterface;

    /**
     * @param float $length
     * @return Square
     */
    public function createSquare(float $length): Square;
}