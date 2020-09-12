<?php

declare(strict_types = 1);

use Folded\Env;
use function Folded\setEnvFolderPath;

beforeEach(function (): void {
    Env::clear();
});

it("should get the value of the env", function (): void {
    setEnvFolderPath(__DIR__ . "/misc");

    expect(Folded\getEnv("APP_NAME"))->toBe("Folded");
});

it("should get the value of the fallback if the env is not present", function (): void {
    setEnvFolderPath(__DIR__ . "/misc");

    expect(Folded\getEnv("APP_BRAND", "Laravel"))->toBe("Laravel");
});

it("should throw an exception if the env name is empty", function (): void {
    $this->expectException(InvalidArgumentException::class);

    setEnvFolderPath(__DIR__ . "/misc");

    Folded\getEnv("");
});

it("should throw an exception message if the env name is empty", function (): void {
    $this->expectExceptionMessage("env name is empty");

    setEnvFolderPath(__DIR__ . "/misc");

    Folded\getEnv("");
});

it("should throw an exception if the env is not present", function (): void {
    $this->expectException(InvalidArgumentException::class);

    setEnvFolderPath(__DIR__ . "/misc");

    Folded\getEnv("APP_BRAND");
});

it("should throw an exception message if the env is not present", function (): void {
    $this->expectExceptionMessage("env APP_BRAND not found");

    setEnvFolderPath(__DIR__ . "/misc");

    Folded\getEnv("APP_BRAND");
});
