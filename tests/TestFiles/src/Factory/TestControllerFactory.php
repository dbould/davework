<?php
namespace Davework\Factory;

class TestControllerFactory
{
    public function __invoke()
    {
        return new TestController();
    }
}
