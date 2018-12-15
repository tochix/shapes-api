<?php declare(strict_types=1);

namespace App\Controllers\Exceptions;

final class InvalidParameterException extends ApiException
{
    const MESSAGE = 'Provided parameter(s) are invalid: %s';

    public static function create(string $msg)
    {
        $message = sprintf(self::MESSAGE, $msg);
        return new self($message, 400);
    }
}