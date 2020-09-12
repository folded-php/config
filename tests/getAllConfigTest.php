<?php

declare(strict_types = 1);

use Folded\Config;
use function Folded\getAllConfig;
use function Folded\setConfigFolderPath;

beforeEach(function (): void {
    Config::clear();
});

it("should return all the configurations", function (): void {
    setConfigFolderPath(__DIR__ . "/misc/config");

    expect(getAllConfig("app"))->toBe([
        "name" => "Folded",
        "timezone" => "Europe/Paris",
        "locales" => ["en", "fr"],
    ]);
});

it("should throw an exception if the path is empty", function (): void {
    $this->expectException(InvalidArgumentException::class);

    getAllConfig("");
});
