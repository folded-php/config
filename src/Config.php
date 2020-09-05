<?php

declare(strict_types = 1);

namespace Folded;

use Folded\Exceptions\NotAFolderException;
use Folded\Exceptions\FolderNotFoundException;
use Illuminate\Config\Repository;
use InvalidArgumentException;

/**
 * Represents the configurations key/values to be shared.
 *
 * @since 0.1.0
 */
class Config
{
    /**
     * The current path with which it a static method of this class has been called.
     *
     * @since 0.1.0
     */
    private static string $currentPath = "";

    /**
     * The path to the folder containing files storing configurations.
     *
     * @since 0.1.0
     */
    private static string $folderPath = "";

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
     * Config::setFolderPath(__DIR__ . "/config");
     *
     * $configurations = Config::all();
     */
    public static function all(string $path): array
    {
        static::setCurrentPath($path);

        return self::engine()->all();
    }

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
     * Config::setFolderPath(__DIR__ . "/config");
     * Config::get("app.name");
     */
    public static function get(string $path)
    {
        static::setCurrentPath($path);

        return self::engine()->get(self::getConfigKeyName());
    }

    /**
     * Get the folder containing files storing configurations.
     *
     * @since 0.1.0
     *
     * @example
     * $path = Config::getFolderPath();
     */
    public static function getFolderPath(): string
    {
        return static::$folderPath;
    }

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
     * Config::setFolderPath(__DIR__ . "/config");
     *
     * if (Config::has("app.name")) {
     * 	echo "has config app.name";
     * } else {
     * 	echo "don't have config app.name";
     * }
     */
    public static function has(string $path): bool
    {
        static::setCurrentPath($path);

        return self::engine()->has(static::getConfigKeyName());
    }

    /**
     * Set the current path to the configuration.
     *
     * @param string $path The path to the configuration.
     *
     * @throws InvalidArgumentException If the path is empty.
     *
     * @since 0.1.0
     *
     * @example
     * Config::setCurrentPath("app.name");
     */
    public static function setCurrentPath(string $path): void
    {
        if (empty(trim($path))) {
            throw new InvalidArgumentException("path is empty");
        }

        self::$currentPath = $path;
    }

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
     * Config::setFolderPath(__DIR__ . "/config");
     */
    public static function setFolderPath(string $path): void
    {
        if (!file_exists($path)) {
            throw new FolderNotFoundException("folder $path not found");
        }

        if (!is_dir($path)) {
            throw new NotAFolderException("$path is not a folder");
        }

        static::$folderPath = $path;
    }

    private static function engine(): Repository
    {
        $fileName = static::getFileName();

        $content = require static::$folderPath . DIRECTORY_SEPARATOR . "$fileName.php";

        return new Repository($content);
    }

    /**
     * Get the configuration key name from a path.
     *
     * @since 0.1.0
     *
     * @example
     * Config::getConfigKeyName();
     */
    private static function getConfigKeyName(): string
    {
        return mb_substr(static::$currentPath, mb_strlen(static::getFileName()) + 1);
    }

    /**
     * Get the file name from a path.
     *
     * @since 0.1.0
     *
     * @example
     * Config::getFileName();
     */
    private static function getFileName(): string
    {
        $matches = [];

        preg_match("/^[^\.]+/", static::$currentPath, $matches);

        return $matches[0];
    }
}
