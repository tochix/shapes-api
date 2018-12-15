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

    /**
     * @param float $length
     * @return Square
     */
    public function createSquare(float $length): Square
    {
        return new Square($length);
    }

    /**
     * @param float $length
     * @param float $width
     * @return Rectangle
     */
    public function createRectangle(float $length, float $width): Rectangle
    {
        return new Rectangle($length, $width);
    }
}