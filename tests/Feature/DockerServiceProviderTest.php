<?php

declare(strict_types=1);

use OwenVoke\LaravelZeroDocker\Console\DockerCommand;
use OwenVoke\LaravelZeroDocker\DockerServiceProvider;

beforeEach(fn () => $this->provider = new DockerServiceProvider($this->app));

it('is deferred', function () {
    $this->assertTrue($this->provider->isDeferred());
    $this->assertContains(DockerCommand::class, $this->provider->provides());
});

it('registers the Docker command', function () {
    $this->provider->register();

    $this->assertInstanceOf(DockerCommand::class, $this->app[DockerCommand::class]);
});
