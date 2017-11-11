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
            $namespace = $this->topLevelNamespace . '\Controller';
            $content = sprintf($template, $namespace, $fileName . 'Controller');
        }

        if ($type == 'controllerFunctionalTest') {
            $location = __DIR__ . '/../../tests/TestFiles/tests/Controller/';
            $filePath = $location . $fileName . 'ControllerTest.php';
            $template = $this->templateService->getTemplate('ControllerFunctionalTest');
            $namespace = 'Tests\Functional\Controller';
            $content = sprintf(
                $template,
                $namespace,
                $fileName . 'Controller');
        }

        if ($type == 'factory') {
            $location = __DIR__ . '/../../tests/TestFiles/src/Factory/';
            $filePath = $location . $fileName . 'Factory.php';
            $template = $this->templateService->getTemplate('Factory');
            $namespace = $this->topLevelNamespace . '\Factory';
            $content = sprintf(
                $template,
                $namespace,
                $fileName . 'Factory',
                $fileName);
        }

        if ($type == 'factoryFunctionalTest') {
            $location = __DIR__ . '/../../tests/TestFiles/tests/Factory/';
            $filePath = $location . $fileName . 'FactoryTest.php';
            $template = $this->templateService->getTemplate('FactoryFunctionalTest');
            $namespace = 'Tests\Functional\Factory';
            $classToTest = $this->topLevelNamespace . '\Factory\\' . $fileName . 'Factory';
            $content = sprintf(
                $template,
                $namespace,
                 $classToTest,
                 $fileName . 'Factory',
                $classToTest,
                $classToTest
            );
        }

        if ($type == 'service') {
            $location = __DIR__ . '/../../tests/TestFiles/src/Service/';
            $filePath = $location . $fileName . 'Service.php';
            $template = $this->templateService->getTemplate('Service');
            $namespace = $this->topLevelNamespace . '\Service';
            $content = sprintf(
                $template,
                $namespace,
                $fileName . 'Service');
        }

        if ($type == 'serviceFunctionalTest') {
            $location = __DIR__ . '/../../tests/TestFiles/tests/Service/';
            $filePath = $location . $fileName . 'ServiceTest.php';
            $template = $this->templateService->getTemplate('ServiceFunctionalTest');
            $namespace = 'Tests\Functional\Service';
            $classToTest = $this->topLevelNamespace . '\Service\\' . $fileName . 'Service';
            $content = sprintf(
                $template,
                $namespace,
                $classToTest,
                $fileName . 'Service',
                $fileName);
        }

        $handler = fopen($filePath, 'x+');

        fwrite($handler, $content);
    }
}