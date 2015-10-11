<?php
/**
 * HHVM
 *
 * Copyright (C) Tony Yip 2015.
 *
 * @author   Tony Yip <tony@opensource.hk>
 * @license  http://opensource.org/licenses/GPL-3.0 GNU General Public License
 */

namespace Spyc\Elearn\Test;


class NavbarTest extends \TestCase
{
    public function testLanguageSwitch()
    {
        $this->visit('/?locale=eh')
            ->see('Language')
            ->click('Chinese')
            ->see('語言');
    }

    public function testLogin()
    {
        $this->visit('/')
            ->see('Login');
    }

    public function testBasic()
    {
        $this->visit('/')
            ->see('Project WHJSLS');
    }
}
