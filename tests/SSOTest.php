<?php

namespace Spyc\Elearn\Test;

class SSOTest extends \TestCase
{

    public function testMetadata()
    {
        $this->visit('sso/metadata')
            ->see('md:EntityDescriptor');
    }

}
