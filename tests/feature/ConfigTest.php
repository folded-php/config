<?php

declare(strict_types = 1);

use Folded\Env;
use Folded\Config;

beforeEach(function (): void {
    Env::clear();
    Config::clear();
});

it("should get the config if set using getEnv", function (): void {
    Env::setFolderPath(__DIR__ . "/../misc");
    Config::setFolderPath(__DIR__ . "/../misc/config");

    expect(Config::get("company.name"))->toBe("Folded");
});
