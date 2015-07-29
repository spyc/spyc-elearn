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

namespace Elearn\Subject\Maths;


use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\JsonResponse;
use Psy\Util\Json;

class MathsController extends Controller
{
    public function index()
    {
        return view('subject::maths.index');
    }

    public function about()
    {
        $users = User::select(['user.name', 'committee.post'])
            ->join('committee', 'user.pycid', '=', 'committee.pycid')
            ->join('community', 'community.id', '=', 'committee.community')
            ->where('community.name', '=', 'Maths')
            ->get()
        ;

        $template = ['committee' => $users];

        return view('subject::maths.about', $template);
    }
}