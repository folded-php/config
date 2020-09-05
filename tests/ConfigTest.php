<?php

declare(strict_types = 1);

use Folded\Config;
use Folded\Exceptions\FolderNotFoundException;
use Folded\Exceptions\NotAFolderException;

it("should store the configuration", function (): void {
    $configFolderPath = __DIR__ . "/misc/config";

    Config::setFolderPath($configFolderPath);

    expect(Config::getFolderPath())->toBe($configFolderPath);
});

it("should throw an exception if the path is not found", function (): void {
    $this->expectException(FolderNotFoundException::class);

    Config::setFolderPath(__DIR__ . "/misc/not-found");
});

it("should throw an exception if the path is not a folder", function (): void {
    $this->expectException(NotAFolderException::class);

    Config::setFolderPath(__DIR__ . "/misc/config/app.php");
});

it("should get the value of the configuration", function (): void {
    Config::setFolderPath(__DIR__ . "/misc/config");

    expect(Config::get("app.name"))->toBe("Folded");
});

it("should throw an exception if the config path is empty", function (): void {
    $this->expectException(InvalidArgumentException::class);

    Config::setFolderPath(__DIR__ . "/misc/config");

    Config::get("");
});

it("should return true if the configuration exists", function (): void {
    Config::setFolderPath(__DIR__ . "/misc/config");

    expect(Config::has("app.name"))->toBe(true);
});

it("should return false if the configuration does not exist", function (): void {
    Config::setFolderPath(__DIR__ . "/misc/config");

    expect(Config::has("app.brand"))->toBe(false);
});

it("should return all the configurations", function (): void {
    Config::setFolderPath(__DIR__ . "/misc/config");

    expect(Config::all("app"))->toBe([
        "name" => "Folded",
        "timezone" => "Europe/Paris",
        "locales" => ["en", "fr"],
    ]);
});
