<?php
namespace Dbould\Davework\Factory;

class MooMooServiceFactory
{
    public function __invoke()
    {
        return new MooMooService();
    }
}
