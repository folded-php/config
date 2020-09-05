<?php

declare(strict_types = 1);

namespace Folded;

if (!function_exists("setEnvFolderPath")) {
    /**
     * Set the folder path to find the .env file.
     *
     * @param string $path The path to the folder containing the .env file.
     *
     * @since 0.1.0
     *
     * @example
     * setEnvFolderPath(__DIR__);
     */
    function setEnvFolderPath(string $path): void
    {
        Env::setFolderPath($path);
    }
}
