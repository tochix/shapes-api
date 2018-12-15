<?php declare(strict_types=1);

namespace App\Service\Http;

class Request implements RequestInterface
{
    const METHOD = 'REQUEST_METHOD';
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const URI = 'REQUEST_URI';

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $_SERVER[static::METHOD];
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $_SERVER[static::URI];
    }
}