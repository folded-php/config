<?php

declare(strict_types = 1);

namespace Folded;

use InvalidArgumentException;

if (!function_exists("Folded\getConfig")) {
    /**
     * Get the configuration value.
     *
     * @param string $path The configuration path.
     *
     * @throws InvalidArgumentException If the path is empty.
     *
     * @return mixed
     *
     * @since 0.1.0
     *
     * @example
     * getConfig("app.name");
     */
    function getConfig(string $path)
    {
        return Config::get($path);
    }
}
