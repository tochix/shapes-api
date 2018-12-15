<?php declare(strict_types=1);

namespace App\Service\Shapes;

abstract class Shape implements ShapeInterface
{
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
}