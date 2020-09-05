<?php

declare(strict_types = 1);

use function Folded\hasConfig;
use function Folded\setConfigFolderPath;

it("should return true if the config is present", function (): void {
    setConfigFolderPath(__DIR__ . "/misc/config");

    expect(hasConfig("app.name"))->toBe(true);
});

it("should return false if the config does not exist", function (): void {
    setConfigFolderPath(__DIR__ . "/misc/config");

    expect(hasConfig("app.not-found"))->toBe(false);
});

it("should throw an exception if the path is empty", function (): void {
    $this->expectException(InvalidArgumentException::class);

    setConfigFolderPath(__DIR__ . "/misc/config");

    hasConfig("");
});
