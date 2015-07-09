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

namespace App\Http\Controllers;


use App\Http\Requests\BugReportRequest;
use App\Model\Bug;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Psy\Util\Json;

class BugController extends Controller
{
    const SUGGEST = 'Suggest';
    const EMERGENCY = 'Emergency';
    const DANGER = 'Danger';
    const ERROR = 'Error';
    const WARNING = 'Warning';
    const INVALID = 'Invalid';

    const COLOR_SUGGEST = '159818';
    const COLOR_EMERGENCY = 'FC2929';
    const COLOR_DANGER = 'EB6420';
    const COLOR_ERROR = 'FBCA04';
    const COLOR_WARNING = '0052CC';
    const COLOR_INVALID = '5319E7';


    public static function getLevelColors()
    {
        return [
            self::ERROR => self::COLOR_ERROR,
            self::SUGGEST => self::COLOR_SUGGEST,
            self::EMERGENCY => self::COLOR_EMERGENCY,
            self::DANGER => self::COLOR_DANGER,
            self::WARNING => self::COLOR_WARNING,
            self::INVALID => self::COLOR_INVALID
        ];
    }
    
    public static function getLevels()
    {
        return [
            self::ERROR,
            self::SUGGEST,
            self::EMERGENCY,
            self::DANGER,
            self::WARNING,
            self::INVALID
        ];
    }

    public function index()
    {
        return view('bug.index');
    }

    public function create()
    {
        return view('bug.create', ['levels' => self::getLevels()]);
    }

    public function store(BugReportRequest $request)
    {
        $form = $request->request;
        $bug = new Bug();

        $bug->level = $form->get('level');
        $bug->title = $form->get('title');
        $bug->page = $form->get('page');
        $bug->detail = $form->get('detail') ?: 'NULL';

        $bug->save();

        return redirect()->route('bug.list');
    }

    public function colors()
    {
        $response = new Response();
        $response->setContent(Json::encode(self::getLevelColors()));
        return $response;
    }
}