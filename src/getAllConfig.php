<?php

declare(strict_types = 1);

namespace Folded;

use InvalidArgumentException;

if (!function_exists("Folded\getAllConfig")) {
    /**
     * Returns all the configurations.
     *
     * @param string $path The configuration path.
     *
     * @throws InvalidArgumentException If the path is empty.
     *
     * @return array<string,mixed>
     *
     * @since 0.1.0
     *
     * @example
     * $configurations = getAllConfig();
     */
    function getAllConfig(string $path): array
    {
        return Config::all($path);
    }
}
