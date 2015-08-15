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
use Elearn\Model\Bug;
use Illuminate\Http\Response;

/**
 * Controller for Handle Bug Reporting.
 *
 * Class BugController
 * @package App\Http\Controllers
 */
class BugController extends Controller
{

    /**
     * Get the color code of every level
     *
     * @return array array<string, string> contains level to color code
     */
    public static function getLevelColors()
    {
        return [
            Bug::ERROR => Bug::COLOR_ERROR,
            Bug::SUGGEST => Bug::COLOR_SUGGEST,
            Bug::EMERGENCY => Bug::COLOR_EMERGENCY,
            Bug::DANGER => Bug::COLOR_DANGER,
            Bug::WARNING => Bug::COLOR_WARNING,
            Bug::INVALID => Bug::COLOR_INVALID
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
            Bug::ERROR,
            Bug::SUGGEST,
            Bug::EMERGENCY,
            Bug::DANGER,
            Bug::WARNING,
            Bug::INVALID
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
        $bug = new Bug();

        $bug->level = $request->input('level');
        $bug->title = $request->input('title');
        $bug->page = $request->input('page');
        $bug->detail = $request->input('detail', 'NULL');

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
        $bugs = Bug::select('level', 'id', 'title', 'created_at')
            ->where('status', 'open')
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

        if (null === $instance) {
            return redirect()->route('bug.list');
        }

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