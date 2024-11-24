<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class DevCommand extends Command
{
    protected $signature = 'dev';
    protected $description = 'Run PHP and Vite development servers';
    protected array $processes = [];
    protected bool $running = true;

    public function handle()
    {
        $this->info('Starting development servers...');

        try {
            $this->startServer('php', ['php', '-S', '127.0.0.1:8000', '-t', 'public']);
            $this->startServer('vite', ['npm', 'run', 'dev']);

            if (PHP_OS === 'WINNT') {
                sapi_windows_set_ctrl_handler(fn($event) => $this->running = ($event !== PHP_WINDOWS_EVENT_CTRL_C));
            }

            while ($this->running && $this->areProcessesRunning()) {
                sleep(1);
            }

            $this->checkProcessStatus();
        } catch (\Exception $e) {
            $this->error('An error occurred: ' . $e->getMessage());
            $this->stopProcesses();
            return 1;
        }

        $this->stopProcesses();
        return 0;
    }

    private function startServer(string $name, array $command)
    {
        $this->processes[$name] = new Process($command, null, ['SYSTEMROOT' => getenv('SYSTEMROOT'), 'PATH' => getenv('PATH')]);
        $this->processes[$name]->setTimeout(null);
        $this->processes[$name]->start(fn($type, $buffer) => $this->handleProcessOutput($name, $type, $buffer));
        $this->output->writeln(ucfirst($name) . ' server started.');
    }

    protected function handleProcessOutput(string $name, string $type, string $buffer)
    {
        foreach (explode("\n", trim($buffer)) as $line) {
            if ($line) {
                if ($type === Process::ERR && str_contains(strtolower($line), 'error')) {
                    $this->error("[$name] $line");
                } else {
                    $this->line("[$name] $line");
                }
            }
        }
    }

    protected function areProcessesRunning(): bool
    {
        return !array_filter($this->processes, fn($process) => !$process->isRunning());
    }

    protected function checkProcessStatus()
    {
        foreach ($this->processes as $name => $process) {
            if (!$process->isRunning() && !$process->isSuccessful()) {
                $this->error("{$name} server stopped unexpectedly (exit code: {$process->getExitCode()})");
            }
        }
    }

    protected function stopProcesses()
    {
        $this->output->writeln('Stopping development servers...');
        foreach ($this->processes as $name => $process) {
            if ($process->isRunning()) {
                $process->stop(3); // Grace period of 3 seconds
                $this->output->writeln(ucfirst($name) . ' server stopped.');
            }
        }
    }

    public function __destruct()
    {
        if ($this->output) {
            $this->stopProcesses();
        }
    }
}
