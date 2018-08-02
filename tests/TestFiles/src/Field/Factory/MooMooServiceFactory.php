<?php
namespace Dbould\Davework\Field\Factory;

class MooMooServiceFactory
{
    public function __invoke()
    {
        return new MooMooService();
    }
}
