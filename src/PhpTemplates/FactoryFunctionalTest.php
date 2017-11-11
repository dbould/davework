<?php
return <<<'FACTORYTEST'
<?php
namespace %s;

use %s;
use Tests\SlimTestCase;

class %s extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(%s::class);

        $this->assertInstanceOf(%s::class, $actual);
    }
}

FACTORYTEST;
