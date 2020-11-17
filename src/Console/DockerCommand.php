<?php

namespace OwenVoke\LaravelZeroDocker\Console;

use Illuminate\Console\Application as Artisan;
use LaravelZero\Framework\Commands\Command;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

final class DockerCommand extends Command
{
    /** @var int */
    private const DOCKER_PROCESS_TIMEOUT = 180;

    /** {@inheritdoc} */
    protected $signature = 'app:docker {name? : The built Phar name}';

    /** {@inheritdoc} */
    protected $description = 'Generate a Dockerfile for your compiled Phar';

    public function handle(): int
    {
        /** @var string $pharPath */
        $pharPath = $this->app->buildsPath(
            /** @phpstan-ignore-next-line */
            $this->input->getArgument('name') ?? $this->getBinary()
        );

        $boxBinary = windows_os() ?
            $this->app->basePath('vendor/laravel-zero/framework/bin/box.bat') :
            $this->app->basePath('vendor/laravel-zero/framework/bin/box');

        if (! file_exists($boxBinary)) {
            $this->warn('  The Box binary could not be found');

            return 1;
        }

        if (! file_exists($pharPath)) {
            $this->warn('  The compiled Phar binary could not be found in the `<options=bold>builds</>` path');

            return 1;
        }

        $process = new Process(
            [$boxBinary, 'docker', '--config='.base_path('box.json'), $pharPath],
            $this->app->buildsPath(),
            null,
            null,
            self::DOCKER_PROCESS_TIMEOUT
        );

        foreach (tap($process)->start() as $type => $data) {
            if ($this->output->getVerbosity() > OutputInterface::VERBOSITY_NORMAL) {
                $process::OUT === $type ? $this->info("$data") : $this->error("$data");
            }
        }

        if ($process->isSuccessful()) {
            $this->info('  Successfully generated Dockerfile in the `<options=bold>builds</>` path');
        }

        return $process->getExitCode() ?? 1;
    }

    private function getBinary(): string
    {
        return str_replace(["'", '"'], '', Artisan::artisanBinary());
    }
}
