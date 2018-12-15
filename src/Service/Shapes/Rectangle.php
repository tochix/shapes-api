<?php declare(strict_types=1);

namespace App\Service\Shapes;

class Rectangle extends Shape
{
    const SHAPE_NAME = 'rectangle';

    /**
     * @var float
     */
    private $length;

    /**
     * @var float
     */
    private $width;

    /**
     * @param float $length
     * @param float $width
     */
    public function __construct(float $length, float $width)
    {
        $this->length = $length;
        $this->width = $width;
    }

    /**
     * @return float
     */
    public function getArea(): float
    {
        return ($this->getLength() * $this->getWidth());
    }

    /**
     * @return string
     */
    public function getParameterDescription(): string
    {
        return 'length: '. $this->getLength() . '; width: ' . $this->getWidth();
    }

    /**
     * @return float
     */
    private function getLength(): float
    {
        return $this->length;
    }

    /**
     * @return float
     */
    private function getWidth(): float
    {
        return $this->width;
    }
}