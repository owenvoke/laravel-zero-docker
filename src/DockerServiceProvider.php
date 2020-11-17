<?php

namespace OwenVoke\LaravelZeroDocker;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use OwenVoke\LaravelZeroDocker\Console\DockerCommand;

final class DockerServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        if (! $this->app->environment('development')) {
            return;
        }

        $this->app->singleton(DockerCommand::class);

        $this->commands(DockerCommand::class);
    }

    /** @return array<int, string> */
    public function provides(): array
    {
        return [DockerCommand::class];
    }
}
