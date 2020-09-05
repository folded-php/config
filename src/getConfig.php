<?php

declare(strict_types = 1);

namespace Folded;

if (!function_exists("getConfig")) {
    /**
     * Get the configuration value.
     *
     * @param string $path The configuration path.
     *
     * @throws InvalidArgumentException If the path is empty.
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
