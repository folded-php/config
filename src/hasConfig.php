<?php

declare(strict_types = 1);

namespace Folded;

use InvalidArgumentException;

if (!function_exists("Folded\hasConfig")) {
    /**
     * Returns true if the configuration is found, else returns false.
     *
     * @param string $path The configuration path.
     *
     * @throws InvalidArgumentException If the path is empty.
     *
     * @since 0.1.0
     *
     * @example
     * if (hasConfig("app.name")) {
     * 	echo "has config app.name";
     * } else {
     * 	echo "don't have config app.name";
     * }
     */
    function hasConfig(string $path): bool
    {
        return Config::has($path);
    }
}
