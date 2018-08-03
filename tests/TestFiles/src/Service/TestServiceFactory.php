<?php
namespace Dbould\Davework\Factory;

class TestServiceFactory
{
    public function __invoke()
    {
        return new TestService();
    }
}
