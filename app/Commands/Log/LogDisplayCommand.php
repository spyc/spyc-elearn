<?php
/**
 * elearn
 *
 * PHP version 5
 *
 * Copyright (C) Tony Yip 2015.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @category Guardian
 * @author   Tony Yip <tony@opensource.hk>
 * @license  http://opensource.org/licenses/GPL-3.0 GNU General Public License
 */

namespace App\Commands\Log;

use Carbon\Carbon;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use App\Commands\Command;

class LogDisplayCommand extends Command implements SelfHandling
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:display {date=now}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display Log';

    /**
     * The filesystem instance.
     *
     * @var Filesystem
     */
    protected $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle()
    {
        $date = $this->argument('date');
        if ('now' === $date) {
            $date = Carbon::now()->subDay()->format('Y-m-d');
        }

        $file = storage_path('logs/laravel-' . $date . '.log');
        if (!$this->files->exists($file))
            throw new FileNotFoundException($file . ' Not Exists (Possible for error date)');

        $this->line($this->files->get($file));
    }

}