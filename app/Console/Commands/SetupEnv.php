<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class SetupEnv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:sniff';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup the code-sniffer tools.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->confirm('This will setup the git hooks in your project directory. Do you wish to continue? [y|N]')) {
            $script = "bash " . base_path('setup_sniff.sh');
           
            $process = new Process($script);
            $process->run();

            // executes after the command finishes
            if (!$process->isSuccessful()) {
                throw new \RuntimeException($process->getErrorOutput());
            }
            echo $process->getOutput();
        }
    }
}
