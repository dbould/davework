<?php
return <<<'SERVICETEST'
<?php
namespace %s;

use %s;
use Tests\SlimTestCase;

class %sTest extends SlimTestCase
{
    public function test()
    {
        $this->assertEquals(true, false);
    }
}

SERVICETEST;
