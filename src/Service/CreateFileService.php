<?php

namespace Davework\Service;

class CreateFileService implements CreateFileInterface
{
    private $template;
    private $namespace;
    private $type;

    public function __construct($template, $namespace, $type, $fileName)
    {
        $this->template = $template;
        $this->namespace = $namespace;
        $this->type = $type;
    }

    public function create()
    {
        if ($this->type == 'factory') {
            $location = 'factory';
        }

        $handler = fopen();
    }
}