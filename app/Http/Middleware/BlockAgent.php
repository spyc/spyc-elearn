<?php
/**
 * HHVM
 *
 * Copyright (C) Tony Yip 2015.
 *
 * @author   Tony Yip <tony@opensource.hk>
 * @license  http://opensource.org/licenses/GPL-3.0 GNU General Public License
 */

namespace App\Http\Middleware;


use Elearn\Foundation\Middleware\BlockUserAgent;

class BlockAgent extends BlockUserAgent
{
    protected $badUserAgents = [
        'Baiduspider'
    ];
}