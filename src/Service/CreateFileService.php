<?php

namespace Davework\Service;

use Davework\FileSpec\Slim\ControllerFileSpec;
use Davework\FileSpec\Slim\ControllerFunctionalTestFileSpec;

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
        if ($type == 'Controller') {
            $location = __DIR__ . '/../../tests/TestFiles/src/Controller/';
            $filePath = $location . $fileName . 'Controller.php';
            $template = $this->templateService->getTemplate('Controller');

            $fileSpec = new ControllerFileSpec(
                $this->topLevelNamespace,
                $fileName,
                $location);

            $content = $fileSpec->getFileContent($template);
        }

        if ($type == 'ControllerFunctionalTest') {
            $location = __DIR__ . '/../../tests/TestFiles/tests/Controller/';
            $filePath = $location . $fileName . 'ControllerTest.php';
            $template = $this->templateService->getTemplate('ControllerFunctionalTest');
            $namespace = 'Tests\Functional\Controller';

            $fileSpec = new ControllerFunctionalTestFileSpec(
                $namespace,
                $fileName,
                $location);

            $content = $fileSpec->getFileContent($template);
        }

        if ($type == 'Factory') {
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

        if ($type == 'FactoryFunctionalTest') {
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

        if ($type == 'Service') {
            $location = __DIR__ . '/../../tests/TestFiles/src/Service/';
            $filePath = $location . $fileName . 'Service.php';
            $template = $this->templateService->getTemplate('Service');
            $namespace = $this->topLevelNamespace . '\Service';
            $content = sprintf(
                $template,
                $namespace,
                $fileName . 'Service');
        }

        if ($type == 'ServiceFunctionalTest') {
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