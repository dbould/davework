<?php
return <<<'CONTROLLER'
<?php
namespace %s;

class %s
{
    public function action(Request $request, Response $response, array $args)
    {
        
        return $response;
    }
}

CONTROLLER;
