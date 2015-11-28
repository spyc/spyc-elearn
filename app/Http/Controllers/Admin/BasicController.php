<?php
/**
 * HHVM
 *
 * Copyright (C) Tony Yip 2015.
 *
 * @author   Tony Yip <tony@opensource.hk>
 * @license  http://opensource.org/licenses/GPL-3.0 GNU General Public License
 */

namespace App\Http\Controllers\Admin;


class BasicController extends AdminController
{
    /**
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $template = $this->basic($this->auth);
        return view('admin.dashboard', $template);
    }
}