<?php

declare(strict_types = 1);

namespace Folded;

if (!function_exists("Folded\hasEnv")) {
    /**
     * Returns true if the env variable is present, else returns false.
     *
     * @param string $name The name of the env variable.
     *
     * @throws InvalidArgumentException If the env name is empty.
     *
     * @since 0.1.0
     *
     * @example
     * if (hasEnv("DB_NAME")) {
     * 	echo "has DB_NAME";
     * } else {
     * 	echo "has no DB_NAME";
     * }
     */
    function hasEnv(string $name): bool
    {
        return Env::has($name);
    }
}
