<?php
/**
 * HHVM
 *
 * Copyright (C) Tony Yip 2015.
 *
 * @author   Tony Yip <tony@opensource.hk>
 * @license  http://opensource.org/licenses/GPL-3.0 GNU General Public License
 */

namespace App\Providers;

use Elearn\Model\Post;
use App\Policies\PostPolicy;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider;

class PostServiceProvider extends AuthServiceProvider
{

    protected $policies = [
        Post::class => PostPolicy::class
    ];

    public function register()
    {

    }

    public function boot(Gate $gate)
    {
        $this->registerPolicies($gate);
    }
}