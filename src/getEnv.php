<?php

declare(strict_types = 1);

namespace Folded;

/**
 * Get the env value. Use the fallback if the env variable is not found.
 *
 * @param string     $name     The name of the env variable.
 * @param null|mixed $fallback
 *
 * @throws InvalidArgumentException If the env name is empty.
 * @throws InvalidArgumentException If the env variable is not present, and not fallback is specified.
 *
 * @since 0.1.0
 *
 * @example
 * setEnvFolderPath(__DIR__);
 *
 * $value = getEnv("APP_NAME");
 */
function getEnv(string $name, $fallback = null)
{
    return Env::get($name, $fallback);
}
