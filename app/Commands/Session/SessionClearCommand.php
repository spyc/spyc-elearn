<?php

namespace App\Commands\Session;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Redis\Database;
use Illuminate\Support\Str;

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
     * @var Database
     */
    protected $client;

    /**
     * Create a new command instance.
     */
    public function __construct(Filesystem $files, Database $db)
    {
        parent::__construct();

        $this->files = $files;
        $this->client = $db;
    }

    /**
     * Execute the command.
     */
    public function handle()
    {
        $method = 'clear' . Str::ucfirst(env('SESSION_DRIVER')) . 'Session';
        $this->$method();

        $this->info('Clear Session Success!');
    }

    protected function clearFileSession()
    {
        $sessions = $this->files->glob($this->laravel['config']['session.files'] . '/*');

        foreach ($sessions as $session) {
            $this->files->delete($session);
        }
    }

    protected function clearRedisSession()
    {
        $redis = $this->client->connection('session');
        $sessions = $redis->keys('laravel:*');
        foreach ($sessions as $session) {
            $redis->del($session);
        }
    }
}
