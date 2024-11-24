<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dev';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the PHP development server and the Vite server';

    /**
     * Array to store running processes
     */
    protected array $processes = [];

    /**
     * Flag to track if we should continue running
     */
    protected bool $running = true;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting development servers...');

        try {
            // Start PHP server
            $this->processes['php'] = new Process(
                ['php', '-S', '127.0.0.1:8000', '-t', 'public'],
                null,
                ['SYSTEMROOT' => getenv('SYSTEMROOT'), 'PATH' => getenv('PATH')]
            );
            $this->processes['php']->setTimeout(null);
            $this->processes['php']->start(function ($type, $buffer) {
                $this->handleProcessOutput('PHP', $type, $buffer);
            });
            $this->info('PHP server started at http://127.0.0.1:8000');

            // Start Vite server
            $this->processes['vite'] = new Process(
                ['npm', 'run', 'dev'],
                null,
                ['SYSTEMROOT' => getenv('SYSTEMROOT'), 'PATH' => getenv('PATH')]
            );
            $this->processes['vite']->setTimeout(null);
            $this->processes['vite']->start(function ($type, $buffer) {
                $this->handleProcessOutput('Vite', $type, $buffer);
            });
            $this->info('Vite server is starting...');

            // Set up signal handling for Windows
            if (PHP_OS === 'WINNT') {
                sapi_windows_set_ctrl_handler(function ($event) {
                    if ($event === PHP_WINDOWS_EVENT_CTRL_C) {
                        $this->running = false;
                    }
                });
            }

            // Monitor processes
            while ($this->running && $this->areProcessesRunning()) {
                usleep(100000); // 100ms delay
            }

            // Check if processes exited unexpectedly
            foreach ($this->processes as $name => $process) {
                if (!$process->isRunning() && !$process->isSuccessful()) {
                    $this->error(sprintf(
                        '%s server stopped unexpectedly (exit code: %d)',
                        ucfirst($name),
                        $process->getExitCode()
                    ));
                }
            }
        } catch (\Exception $e) {
            $this->error('An error occurred: ' . $e->getMessage());
            $this->stopProcesses();
            return 1;
        }

        $this->stopProcesses();
        return 0;
    }

    /**
     * Handle process output
     */
    protected function handleProcessOutput(string $prefix, string $type, string $buffer): void
    {
        $lines = explode("\n", trim($buffer));
        foreach ($lines as $line) {
            if (empty($line)) {
                continue;
            }

            if ($type === Process::ERR) {
                // Only show actual errors, not Vite's build warnings
                if (str_contains(strtolower($line), 'error') && !str_contains($line, 'forking is not supported')) {
                    $this->error("[$prefix] $line");
                } else {
                    $this->line("[$prefix] $line");
                }
            } else {
                $this->line("[$prefix] $line");
            }
        }
    }

    /**
     * Check if all processes are still running
     */
    protected function areProcessesRunning(): bool
    {
        foreach ($this->processes as $process) {
            if (!$process->isRunning()) {
                return false;
            }
        }
        return true;
    }

    /**
     * Stop all running processes
     */
    protected function stopProcesses(): void
    {
        $this->info('Stopping development servers...');
        
        foreach ($this->processes as $name => $process) {
            if ($process->isRunning()) {
                $process->stop(3); // Grace period of 3 seconds
                $this->info(ucfirst($name) . ' server stopped.');
            }
        }
    }

    /**
     * Handle command interruption
     */
    public function __destruct()
    {
        $this->stopProcesses();
    }
}