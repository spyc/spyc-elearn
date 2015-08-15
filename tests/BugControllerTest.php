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

namespace Spyc\Elearn\Test;

use App\Model\Bug;
use App\Http\Controllers\BugController;

class BugControllerTest extends \TestCase
{
    public function testGetLevelColors()
    {
        $colors = BugController::getLevelColors();
        $this->assertSame([
            Bug::ERROR => Bug::COLOR_ERROR,
            Bug::SUGGEST => Bug::COLOR_SUGGEST,
            Bug::EMERGENCY => Bug::COLOR_EMERGENCY,
            Bug::DANGER => Bug::COLOR_DANGER,
            Bug::WARNING => Bug::COLOR_WARNING,
            Bug::INVALID => Bug::COLOR_INVALID
        ], $colors);
    }

    public function testLevels()
    {
        $level = BugController::getLevels();
        $this->assertSame([Bug::ERROR,
            Bug::SUGGEST,
            Bug::EMERGENCY,
            Bug::DANGER,
            Bug::WARNING,
            Bug::INVALID], $level);
    }

    public function testIndex()
    {
        $this->visit('/bug')
            ->see('Report us a bug and we make it better');
        $this->visit('/bug')
            ->click('View Issue')
            ->seePageIs('/bug/list');
        $this->visit('/bug')
            ->click('Start Report')
            ->seePageIs('/bug/create');
    }

    public function testList()
    {
        $this->visit('/bug/list')
            ->see('Issue List');
    }
}
