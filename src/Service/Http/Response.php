<?php declare(strict_types=1);

namespace App\Service\Http;

class Response implements ResponseInterface
{
    /**
     * @param string[] $resp
     */
    public function toJson(array $resp)
    {
        echo json_encode($resp);
    }
}