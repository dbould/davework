<?php

namespace Davework\Service;

use Davework\FileSpec\Slim\ControllerFileSpec;
use Davework\FileSpec\Slim\ControllerFunctionalTestFileSpec;
use Davework\FileSpec\Slim\FactoryFileSpec;
use Davework\FileSpec\Slim\FactoryFunctionalTestFileSpec;
use Davework\FileSpec\Slim\ServiceFileSpec;
use Davework\FileSpec\Slim\ServiceFunctionalTestFileSpec;

class CreateFileService implements CreateFileInterface
{
    private $templateService;
    private $topLevelNamespace;
    private $topLevelTestNamespace;

    /**
     * CreateFileService constructor.
     * @param TemplateService $templateService
     * @param $topLevelNamespace
     */
    public function __construct($templateService, $topLevelNamespace, $topLevelTestNamespace)
    {
        $this->templateService = $templateService;
        $this->topLevelNamespace = $topLevelNamespace;
        $this->topLevelTestNamespace = $topLevelTestNamespace;
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

            $fileSpec = new FactoryFileSpec(
                $this->topLevelNamespace,
                $fileName,
                $location
            );

            $content = $fileSpec->getFileContent($template);
        }

        if ($type == 'FactoryFunctionalTest') {
            $location = __DIR__ . '/../../tests/TestFiles/tests/Factory/';
            $filePath = $location . $fileName . 'FactoryTest.php';
            $template = $this->templateService->getTemplate('FactoryFunctionalTest');
            $namespace = 'Tests\Functional\Factory';

            $fileSpec = new FactoryFunctionalTestFileSpec(
                $namespace,
                $fileName,
                $location
            );

            $content = $fileSpec->getFileContent($template);
        }

        if ($type == 'Service') {
            $location = __DIR__ . '/../../tests/TestFiles/src/Service/';
            $filePath = $location . $fileName . 'Service.php';
            $template = $this->templateService->getTemplate('Service');

            $fileSpec = new ServiceFileSpec(
                $this->topLevelNamespace,
                $fileName,
                $location
            );

            $content = $fileSpec->getFileContent($template);
        }

        if ($type == 'ServiceFunctionalTest') {
            $location = __DIR__ . '/../../tests/TestFiles/tests/Service/';
            $filePath = $location . $fileName . 'ServiceTest.php';
            $template = $this->templateService->getTemplate('ServiceFunctionalTest');
            $namespace = 'Tests\Functional\Service';

            $fileSpec = new ServiceFunctionalTestFileSpec(
                $namespace,
                $fileName,
                $location
            );

            $content = $fileSpec->getFileContent($template);
        }

        $handler = fopen($filePath, 'x+');

        fwrite($handler, $content);
    }
}