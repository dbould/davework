<?php

namespace Davework\Service;

class CreateFileService implements CreateFileInterface
{
    private $templateService;
    private $topLevelNamespace;

    /**
     * CreateFileService constructor.
     * @param TemplateService $templateService
     * @param $namespace
     */
    public function __construct($templateService, $topLevelNamespace)
    {
        $this->templateService = $templateService;
        $this->topLevelNamespace = $topLevelNamespace;
    }

    public function create($fileName, $type)
    {
        if ($type == 'controller') {
            $location = __DIR__ . '/../../tests/TestFiles/src/Controller/';
            $filePath = $location . $fileName . 'Controller.php';
            $template = $this->templateService->getTemplate('Controller');
            $content = sprintf($template, $this->topLevelNamespace . '\Controller', $fileName . 'Controller', $fileName);
        }

        if ($type == 'controllerFunctionalTest') {
            $location = __DIR__ . '/../../tests/TestFiles/tests/Controller/';
            $filePath = $location . $fileName . 'ControllerTest.php';
            $template = $this->templateService->getTemplate('ControllerFunctionalTest');
            $content = sprintf($template, 'Tests\Functional\Controller', $fileName . 'Factory', $fileName);
        }

        if ($type == 'factory') {
            $location = __DIR__ . '/../../tests/TestFiles/src/Factory/';
            $filePath = $location . $fileName . 'Factory.php';
            $template = $this->templateService->getTemplate('Factory');
            $content = sprintf($template, $this->topLevelNamespace . '\Factory', $fileName . 'Factory', $fileName);
        }

        if ($type == 'factoryFunctionalTest') {
            $location = __DIR__ . '/../../tests/TestFiles/tests/Factory/';
            $filePath = $location . $fileName . 'FactoryTest.php';
            $template = $this->templateService->getTemplate('FactoryFunctionalTest');
            $content = sprintf($template, 'Tests\Functional\Factory', $fileName . 'Factory', $fileName);
        }

        if ($type == 'service') {
            $location = __DIR__ . '/../../tests/TestFiles/src/Service/';
            $filePath = $location . $fileName . 'Service.php';
            $template = $this->templateService->getTemplate('Service');
            $content = sprintf($template, $this->topLevelNamespace . '\Service', $fileName . 'Factory', $fileName);
        }

        if ($type == 'serviceFunctionalTest') {
            $location = __DIR__ . '/../../tests/TestFiles/tests/Service/';
            $filePath = $location . $fileName . 'ServiceTest.php';
            $template = $this->templateService->getTemplate('ServiceFunctionalTest');
            $content = sprintf($template, 'Tests\Functional\Service', $fileName . 'Factory', $fileName);
        }

        $handler = fopen($filePath, 'x+');

        fwrite($handler, $content);
    }
}