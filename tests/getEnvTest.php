<?php

declare(strict_types = 1);

use function Folded\setEnvFolderPath;
use function Folded\getEnv;

it("should get the value of the env", function (): void {
    setEnvFolderPath(__DIR__ . "/misc");

    expect(getenv("APP_NAME"))->toBe("Folded");
});

it("should get the value of the fallback if the env is not present", function (): void {
    setEnvFolderPath(__DIR__ . "/misc");

    expect(getenv("APP_BRAND", "Laravel"))->toBe("Laravel");
});

it("should throw an exception if the env name is empty", function (): void {
    $this->expectException(InvalidArgumentException::class);

    setEnvFolderPath(__DIR__ . "/misc");

    getenv("");
});

it("should throw an exception message if the env name is empty", function (): void {
    $this->expectExceptionMessage("env name is empty");

    setEnvFolderPath(__DIR__ . "/misc");

    getenv("");
});

it("should throw an exception if the env is not present", function (): void {
    $this->expectException(InvalidArgumentException::class);

    setEnvFolderPath(__DIR__ . "/misc");

    getenv("APP_BRAND");
});

it("should throw an exception message if the env is not present", function (): void {
    $this->expectExceptionMessage("env APP_BRAND not found");

    setEnvFolderPath(__DIR__ . "/misc");

    getenv("APP_BRAND");
});
