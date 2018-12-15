<?php declare(strict_types=1);

namespace App\Service\Http;

interface RequestInterface
{
    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @return string
     */
    public function getUri(): string;
}