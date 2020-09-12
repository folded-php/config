<?php

declare(strict_types = 1);

use Folded\Env;
use function Folded\hasEnv;
use function Folded\setEnvFolderPath;

beforeEach(function (): void {
    Env::clear();
});

it("should return true if the env is present", function (): void {
    setEnvFolderPath(__DIR__ . "/misc");

    expect(hasEnv("APP_NAME"))->toBe(true);
});

it("should return false if the env is not present", function (): void {
    setEnvFolderPath(__DIR__ . "/misc");

    expect(hasEnv("APP_BRAND"))->toBe(false);
});

it("should throw an exception if the env name is empty", function (): void {
    $this->expectException(InvalidArgumentException::class);

    setEnvFolderPath(__DIR__ . "/misc");

    hasEnv("");
});
