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
    private $rootDirectory;

    /**
     * CreateFileService constructor.
     * @param TemplateService $templateService
     * @param $topLevelNamespace
     * @param $topLevelTestNamespace
     * @param $rootDirectory
     */
    public function __construct($templateService, $topLevelNamespace, $topLevelTestNamespace, $rootDirectory)
    {
        $this->templateService = $templateService;
        $this->topLevelNamespace = $topLevelNamespace;
        $this->topLevelTestNamespace = $topLevelTestNamespace;
        $this->rootDirectory = $rootDirectory;
    }

    public function create($fileName, $type)
    {
        if ($type == 'Controller') {
            $template = $this->templateService->getTemplate('Controller');

            $fileSpec = new ControllerFileSpec(
                $this->topLevelNamespace,
                $fileName,
                $this->rootDirectory
            );

            $filePath = $fileSpec->getFilePath();
            $content = $fileSpec->getFileContent($template);
        }

        if ($type == 'ControllerFunctionalTest') {
            $template = $this->templateService->getTemplate('ControllerFunctionalTest');

            $fileSpec = new ControllerFunctionalTestFileSpec(
                $this->topLevelTestNamespace,
                $fileName,
                $this->rootDirectory);

            $filePath = $fileSpec->getFilePath();
            $content = $fileSpec->getFileContent($template);
        }

        if ($type == 'Factory') {
            $template = $this->templateService->getTemplate('Factory');

            $fileSpec = new FactoryFileSpec(
                $this->topLevelNamespace,
                $fileName,
                $this->rootDirectory
            );

            $filePath = $fileSpec->getFilePath();
            $content = $fileSpec->getFileContent($template);
        }

        if ($type == 'FactoryFunctionalTest') {
            $location = $this->rootDirectory . '/tests/Factory/';
            $filePath = $location . $fileName . 'FactoryTest.php';
            $template = $this->templateService->getTemplate('FactoryFunctionalTest');

            $fileSpec = new FactoryFunctionalTestFileSpec(
                $this->topLevelTestNamespace,
                $fileName,
                $this->rootDirectory
            );

            $filePath = $fileSpec->getFilePath();
            $content = $fileSpec->getFileContent($template);
        }

        if ($type == 'Service') {
            $location = $this->rootDirectory . '/src/Service/';
            $filePath = $location . $fileName . 'Service.php';
            $template = $this->templateService->getTemplate('Service');

            $fileSpec = new ServiceFileSpec(
                $this->topLevelNamespace,
                $fileName,
                $this->rootDirectory
            );

            $filePath = $fileSpec->getFilePath();
            $content = $fileSpec->getFileContent($template);
        }

        if ($type == 'ServiceFunctionalTest') {
            $location = $this->rootDirectory . '/tests/Service/';
            $filePath = $location . $fileName . 'ServiceTest.php';
            $template = $this->templateService->getTemplate('ServiceFunctionalTest');

            $fileSpec = new ServiceFunctionalTestFileSpec(
                $this->topLevelTestNamespace,
                $fileName,
                $this->rootDirectory
            );

            $filePath = $fileSpec->getFilePath();
            $content = $fileSpec->getFileContent($template);
        }

        $handler = fopen($filePath, 'x+');

        fwrite($handler, $content);
    }
}