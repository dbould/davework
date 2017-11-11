<?php

namespace Davework\Service;

class CreateFileService implements CreateFileInterface
{
    private $templateService;
    private $namespace;

    /**
     * CreateFileService constructor.
     * @param TemplateService $templateService
     * @param $namespace
     */
    public function __construct($templateService, $namespace)
    {
        $this->templateService = $templateService;
        $this->namespace = $namespace;
    }

    public function create($fileName, $type)
    {
        if ($type == 'factory') {
            $location = __DIR__ . '/../../tests/TestFiles/Factory/';
            $filePath = $location . $fileName . 'Factory.php';
            $template = $this->templateService->getTemplate('Factory');
        }

        $handler = fopen($filePath, 'x+');

        fwrite($handler, sprintf($template, $this->namespace, $fileName . 'Factory', $fileName));
    }
}