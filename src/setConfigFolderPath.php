<?php

declare(strict_types = 1);

namespace Folded;

if (!function_exists("Folded\setConfigFolderPath")) {
    /**
     * Set the folder containing the files storing configurations.
     *
     * @param string $path The path where the files store configurations.
     *
     * @throws Folded\Exceptions\FolderNotFoundException If the folder is not found.
     * @throws Folded\Exceptions\NotAFolderException     If the path is not a folder.
     *
     * @since 0.1.0
     *
     * @example
     * setConfigFolderPath(__DIR__ . "/config");
     */
    function setConfigFolderPath(string $path): void
    {
        Config::setFolderPath($path);
    }
}
