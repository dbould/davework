<?php
namespace Davework\Functional\Factory;

class Davework\Factory\TestFactory
{
    public function __invoke()
    {
        return new TestFactory();
    }
}
