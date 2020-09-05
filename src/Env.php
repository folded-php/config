<?php

declare(strict_types = 1);

namespace Folded;

use Dotenv\Dotenv;
use Folded\Exceptions\FolderNotFoundException;
use Folded\Exceptions\NotAFolderException;
use InvalidArgumentException;

/**
 * Represents environment variables.
 *
 * @since 0.1.0
 */
class Env
{
    /**
     * Whether the env engine has been set up or not.
     *
     * @since 0.1.0
     */
    private static bool $booted = false;

    /**
     * The folder path containing the .env file.
     *
     * @since 0.1.0
     */
    private static string $folderPath = "";

    /**
     * Clear the Env state.
     * Useful for unit tests.
     *
     * @since 0.1.0
     *
     * @example
     * Env::clear();
     */
    public static function clear(): void
    {
        self::$booted = false;
        self::$folderPath = "";
    }

    /**
     * Get the env value. Use the fallback if the env variable is not found.
     *
     * @param string     $name     The name of the env variable.
     * @param null|mixed $fallback The value to use if the env variable is not present.
     *
     * @throws InvalidArgumentException If the env name is empty.
     * @throws InvalidArgumentException If the env variable is not present, and not fallback is specified.
     *
     * @since 0.1.0
     *
     * @example
     * Env::setFolderPath(__DIR__);
     *
     * $value = Env::get("APP_NAME");
     */
    public static function get(string $name, $fallback = null)
    {
        self::checkName($name);
        self::boot();

        if (isset($_ENV[$name])) {
            return $_ENV[$name];
        }

        if ($fallback !== null) {
            return $fallback;
        }

        throw new InvalidArgumentException("env $name not found");
    }

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
     * if (Env::has("DB_NAME")) {
     * 	echo "has DB_NAME";
     * } else {
     * 	echo "has no DB_NAME";
     * }
     */
    public static function has(string $name): bool
    {
        self::checkName($name);
        self::boot();

        return isset($_ENV[$name]);
    }

    /**
     * Set the folder path to find the .env file.
     *
     * @param string $path The path to the folder containing the .env file.
     *
     * @since 0.1.0
     *
     * @example
     * Env::setFolderPath(__DIR__);
     */
    public static function setFolderPath(string $path): void
    {
        if (!file_exists($path)) {
            throw new FolderNotFoundException("folder $path not found");
        }

        if (!is_dir($path)) {
            throw new NotAFolderException("$path is not a folder");
        }

        self::$folderPath = $path;
    }

    /**
     * Boot the env engine if not done yet (acting as a singleton like).
     *
     * @since 0.1.0
     *
     * @example
     * Env::boot();
     */
    private static function boot(): void
    {
        if (!self::$booted) {
            Dotenv::createImmutable(self::$folderPath)->load();
        }
    }

    /**
     * Throws an exception if the env variable name is not correct.
     *
     * @throws InvalidArgumentException If the env variable name is empty.
     *
     * @since 0.1.0
     *
     * @example
     * Env::checkName("foo");
     */
    private static function checkName(string $name): void
    {
        if (empty(trim($name))) {
            throw new InvalidArgumentException("env name is empty");
        }
    }
}
