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


use App\Exceptions\NotFoundException;
use App\Http\Requests\BugReportRequest;
use App\Model\Bug;
use App\Services\Github\Issue;
use Illuminate\Http\Response;
use Psy\Util\Json;

/**
 * Controller for Handle Bug Reporting.
 *
 * Class BugController
 * @package App\Http\Controllers
 */
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


    /**
     * Get the color code of every level
     *
     * @return array array<string, string> contains level to color code
     */
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

    /**
     * Get all level of bug.
     *
     * @return array array<string> contain all level of error
     */
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

    /**
     * Index page of the bug report.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('bug.index');
    }

    /**
     * Display form for reporting bug.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('bug.create', ['levels' => self::getLevels()]);
    }

    /**
     * Store the input bug report.
     *
     * @param BugReportRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Display all the bug basic data.
     *
     * @return \Illuminate\View\View
     */
    public function all()
    {
        $bugs = Bug::where('status', 'open')
            ->orderBy('id', 'desc')
            ->get()
        ;
        $template = ['bugs' => $bugs];

        return view('bug.list', $template);
    }

    /**
     * Display detail information of the bug with given bug ID.
     *
     * @param int $bug Bug ID
     *
     * @return \Illuminate\View\View
     */
    public function show($bug)
    {
        $template = [];

        $instance = Bug::where(['id' => $bug])->first();
        $template['bug'] = $instance;

        return view('bug.show', $template);
    }

    /**
     * Redirect all the request to bug.show
     *
     * @param int $bug Bug ID
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @see BugController#show(int)
     */
    public function edit($bug)
    {
        return redirect()->route('bug.show', $bug);
    }
}