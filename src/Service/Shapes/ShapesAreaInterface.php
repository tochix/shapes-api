<?php declare(strict_types=1);

namespace App\Service\Shapes;

interface ShapesAreaInterface
{
    /**
     * @return float
     */
    public function getArea(): float;
}