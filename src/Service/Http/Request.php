<?php declare(strict_types=1);

namespace App\Service\Http;

class Request implements RequestInterface
{
    const METHOD = 'REQUEST_METHOD';
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const URI = 'REQUEST_URI';
    const SERVER_PROTOCOL = 'SERVER_PROTOCOL';

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

    public function sendMethodNotAllowedHeader()
    {
        header($this->getServerProtocol() . ' 405 Method Not Allowed');
    }

    public function sendNotFoundHeader()
    {
        header($this->getServerProtocol() . ' 404 Not Found');
    }

    /**
     * @param string $type
     * @param string $parameter
     * @return null|string
     */
    public function getRequestParam(string $type, string $parameter)
    {
        switch ($type) {
            case static::METHOD_GET:
                $parameterValue = $this->getParamFromGetVar($parameter);
                break;
            case static::METHOD_POST:
                $parameterValue = $this->getParamFromPostVar($parameter);
                break;
            default:
                $parameterValue = null;
        }

        return $parameterValue;
    }

    /**
     * @param string $parameter
     * @return null|string
     */
    private function getParamFromGetVar(string $parameter)
    {
        return $this->getParamFromVar($parameter, $_GET);
    }

    /**
     * @param string $parameter
     * @return null|string
     */
    private function getParamFromPostVar(string $parameter)
    {
        return $this->getParamFromVar($parameter, $_POST);
    }

    /**
     * @param string $parameter
     * @param array $var
     * @return string|null
     */
    private function getParamFromVar(string $parameter, array $var)
    {
        if (array_key_exists($parameter, $var)) {
            return $var[$parameter];
        }

        return null;
    }

    private function getServerProtocol()
    {
        return $_SERVER[static::SERVER_PROTOCOL];
    }
}