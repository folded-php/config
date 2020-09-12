<?php

declare(strict_types = 1);

use Folded\Config;
use function Folded\getConfig;
use function Folded\setConfigFolderPath;

beforeEach(function (): void {
    Config::clear();
});

it("should return the config", function (): void {
    setConfigFolderPath(__DIR__ . "/misc/config");

    expect(getConfig("app.name"))->toBe("Folded");
});

it("should throw an exception if the config path is empty", function (): void {
    $this->expectException(InvalidArgumentException::class);

    getConfig("");
});
