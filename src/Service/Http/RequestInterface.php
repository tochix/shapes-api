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

    /**
     * @param string $type
     * @param string $parameter
     * @return null|string
     */
    public function getRequestParam(string $type, string $parameter);

    public function sendMethodNotAllowedHeader();

    public function sendNotFoundHeader();
}