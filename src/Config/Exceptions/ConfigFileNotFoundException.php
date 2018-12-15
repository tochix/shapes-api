<?php declare(strict_types=1);

namespace App\Config\Exceptions;

use Exception;

final class ConfigFileNotFoundException extends Exception
{
    const MESSAGE = 'Config file "%s" was not found or not readable';

    /**
     * @param string $configFile
     * @return ConfigFileNotFoundException
     */
    public static function create(string $configFile): ConfigFileNotFoundException
    {
        $message = sprintf(self::MESSAGE, $configFile);
        return new self($message);
    }
}