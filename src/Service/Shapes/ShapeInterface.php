<?php declare(strict_types=1);

namespace App\Service\Shapes;

interface ShapeInterface
{
    /**
     * @return float
     */
    public function getArea(): float;

    /**
     * @return string
     */
    public function getShapeName(): string;

    /**
     * @return string
     */
    public function getParameterDescription(): string;

    /**
     * @return string[]
     */
    public function describe(): array;
}