<?php

declare(strict_types = 1);

namespace Folded;

if (!function_exists("Folded\getAllConfig")) {
    /**
     * Returns all the configurations.
     *
     * @param string $path The configuration path.
     *
     * @throws InvalidArgumentException If the path is empty.
     *
     * @since 0.1.0
     *
     * @example
     * $configurations = getAllConfig();
     */
    function getAllConfig(string $path)
    {
        return Config::all($path);
    }
}
