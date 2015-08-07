<?php

namespace App\Commands\Session;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Filesystem\Filesystem;

class SessionClearCommand extends Command implements SelfHandling
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'session:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Session Storage';

    /**
     * The filesystem instance.
     *
     * @var Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $sessions = $this->files->glob($this->laravel['config']['session.files'] . '/*');

        foreach ($sessions as $session) {
            $this->files->delete($session);
        }

        $this->info('Clear Session Success!');
    }
}
