<?php

declare(strict_types = 1);

use function Folded\getAllConfig;

it("should return all the configurations", function (): void {
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
