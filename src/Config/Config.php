<?php declare(strict_types=1);

namespace App\Config;

use App\Config\Exceptions\ConfigFileNotFoundException;

abstract class Config
{
    /**
     * @param string $configFile
     * @return mixed
     * @throws ConfigFileNotFoundException
     */
    protected function readInConfigFile(string $configFile)
    {
        if (!is_file($configFile) || !is_readable($configFile)) {
            throw ConfigFileNotFoundException::create($configFile);
        }

        return include $configFile;
    }

}