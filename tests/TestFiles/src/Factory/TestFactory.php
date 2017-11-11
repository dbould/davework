<?php
namespace Davework\Factory;

class TestFactory
{
    public function __invoke()
    {
        return new Test();
    }
}
