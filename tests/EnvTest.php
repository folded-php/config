<?php

declare(strict_types = 1);

use Folded\Env;
use Folded\Exceptions\FolderNotFoundException;
use Folded\Exceptions\NotAFolderException;

beforeEach(function (): void {
    Env::clear();
});

it("should return the env value", function (): void {
    Env::setFolderPath(__DIR__ . "/misc");

    expect(Env::get("APP_NAME"))->toBe("Folded");
});

it("should return the fallback value if the env variable is missing", function (): void {
    Env::setFolderPath(__DIR__ . "/misc");

    expect(Env::get("APP_BRAND", "Laravel"))->toBe("Laravel");
});

it("should throw an exception if the key is empty", function (): void {
    $this->expectException(InvalidArgumentException::class);

    Env::setFolderPath(__DIR__ . "/misc");

    Env::get("");
});

it("should throw an exception message if the key is empty", function (): void {
    $this->expectExceptionMessage("env name is empty");

    Env::setFolderPath(__DIR__ . "/misc");

    Env::get("");
});

it("should throw an exception if the env is not present", function (): void {
    $this->expectException(InvalidArgumentException::class);

    Env::setFolderPath(__DIR__ . "/misc");

    Env::get("FOO_BAR");
});

it("should throw an exception message if the env is not present", function (): void {
    $this->expectExceptionMessage("env FOO_BAR not found");

    Env::setFolderPath(__DIR__ . "/misc");

    Env::get("FOO_BAR");
});

it("should throw an exception if the folder is not found", function (): void {
    $this->expectException(FolderNotFoundException::class);

    Env::setFolderPath(__DIR__ . "/misc/not-found");
});

it("should throw an exception if the path is not a folder", function (): void {
    $this->expectException(NotAFolderException::class);

    Env::setFolderPath(__DIR__ . "/misc/.env");
});
