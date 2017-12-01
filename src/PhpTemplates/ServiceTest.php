<?php
return <<<'SERVICETEST'
<?php
namespace %s;

use %s;
use Tests\SlimTestCase;

class %s extends SlimTestCase
{
    public function test()
    {
        $this->assertEquals(true, false);
    }
}

SERVICETEST;
