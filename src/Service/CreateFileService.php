<?php

namespace Davework\Service;

class CreateFileService implements CreateFileInterface
{
    private $template;
    private $namespace;
    private $type;
    private $fileName;

    public function __construct($template, $namespace, $type, $fileName)
    {
        $this->template = $template;
        $this->namespace = $namespace;
        $this->type = $type;
        $this->fileName = $fileName;
    }

    public function create()
    {
        if ($this->type == 'factory') {
            $location = __DIR__ . '/../../tests/TestFiles/Factory/';
            $fileName = $location . $this->fileName . 'Factory.php';
        }


        $handler = fopen($fileName, 'x+');

        fwrite($handler, sprintf($this->template, $this->namespace, $this->fileName . 'Factory', $this->fileName));
    }
}