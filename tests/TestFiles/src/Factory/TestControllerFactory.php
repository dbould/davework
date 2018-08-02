<?php
namespace Dbould\Davework\Factory;

class TestControllerFactory
{
    public function __invoke()
    {
        return new TestController();
    }
}
