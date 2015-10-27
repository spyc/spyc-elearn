<?php
/**
 * HHVM
 *
 * Copyright (C) Tony Yip 2015.
 *
 * @author   Tony Yip <tony@opensource.hk>
 * @license  http://opensource.org/licenses/GPL-3.0 GNU General Public License
 */

namespace App\Policies;

use Elearn\Foundation\Policy\Policy;
use Elearn\Model\Post;
use Elearn\Model\User;

class PostPolicy extends Policy
{
    public function update(User $user, Post $post)
    {
        if ($user->pycid === $post->owner->pycid && $post->isAuth(Post::OWNER_WRITE)) {
            return true;
        } elseif ($user->inCommunity($post->group->name) && $post->isAuth(Post::GROUP_WRITE)) {
            return true;
        } else {
            return $post->isAuth(Post::OTHER_WRITE);
        }
    }
}