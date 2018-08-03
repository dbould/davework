<?php
namespace Dbould\Davework\Diary\Factory;

class TestServiceFactory
{
    public function __invoke()
    {
        return new TestService();
    }
}
