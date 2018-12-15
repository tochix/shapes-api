<?php declare(strict_types=1);

namespace App\Service\Http;

interface ResponseInterface
{
    /**
     * @param string[] $resp
     */
    public function toJson(array $resp);
}