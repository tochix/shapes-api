<?php declare(strict_types=1);

namespace App\Service\Shapes;

class Square extends Shape
{
    const SHAPE_NAME = 'square';

    /**
     * @var float
     */
    private $length;

    /**
     * @param float $length
     */
    public function __construct(float $length)
    {
        $this->length = $length;
    }

    /**
     * @return float
     */
    public function getArea(): float
    {
        return ($this->getLength() ** 2);
    }

    /**
     * @return string
     */
    public function getShapeName(): string
    {
        return static::SHAPE_NAME;
    }

    /**
     * @return string
     */
    public function getParameterDescription(): string
    {
        return 'length: '. $this->getLength();
    }

    /**
     * @return float
     */
    private function getLength(): float
    {
        return $this->length;
    }
}