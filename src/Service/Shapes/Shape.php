<?php declare(strict_types=1);

namespace App\Service\Shapes;

abstract class Shape implements ShapeInterface
{
    const SHAPE_NAME = 'shape';

    /**
     * @return string[]
     */
    public function describe(): array
    {
        return [
            'area' => $this->getArea(),
            'type' => $this->getShapeName(),
            'parameters' => $this->getParameterDescription()
        ];
    }

    /**
     * @return string
     */
    public function getShapeName(): string
    {
        return static::SHAPE_NAME;
    }
}