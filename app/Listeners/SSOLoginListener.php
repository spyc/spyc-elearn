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

namespace App\Listeners;

use Aacotroneo\Saml2\Events\Saml2LoginEvent;
use Elearn\Model\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Log;

class SSOLoginListener
{
    /**
     * @var Guard
     */
    private $auth;

    /**
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Saml2LoginEvent $event
     */
    public function handle(Saml2LoginEvent $event)
    {
        $user = $event->getSaml2User();
        try {
            $id = $user->getAttributes()['sAMAccountName'][0];
            $laravel = User::findOrFail($id);
            $this->auth->login($laravel);
        } catch (\Exception $e){
            Log::error($e);
        }
    }
}