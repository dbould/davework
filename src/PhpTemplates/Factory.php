<?php
return <<<'FACTORY'
<?php
namespace %s;

class %s
{
    public function __invoke()
    {
        return new %s();
    }
}

FACTORY;
