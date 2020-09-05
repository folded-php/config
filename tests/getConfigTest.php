<?php

declare(strict_types = 1);

use function Folded\getConfig;

it("should return the config", function (): void {
    expect(getConfig("app.name"))->toBe("Folded");
});

it("should throw an exception if the config path is empty", function (): void {
    $this->expectException(InvalidArgumentException::class);

    getConfig("");
});
