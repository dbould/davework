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
        $template = $this->templateService->getTemplate($type);

        if ($type == 'Controller') {
            $fileSpec = new ControllerFileSpec(
                $this->topLevelNamespace,
                $fileName,
                $this->rootDirectory
            );
        }

        if ($type == 'ControllerFunctionalTest') {
            $fileSpec = new ControllerFunctionalTestFileSpec(
                $this->topLevelTestNamespace,
                $fileName,
                $this->rootDirectory
            );
        }

        if ($type == 'Factory') {
            $fileSpec = new FactoryFileSpec(
                $this->topLevelNamespace,
                $fileName,
                $this->rootDirectory
            );
        }

        if ($type == 'FactoryFunctionalTest') {
            $fileSpec = new FactoryFunctionalTestFileSpec(
                $this->topLevelTestNamespace,
                $fileName,
                $this->rootDirectory
            );
        }

        if ($type == 'Service') {
            $fileSpec = new ServiceFileSpec(
                $this->topLevelNamespace,
                $fileName,
                $this->rootDirectory
            );
        }

        if ($type == 'ServiceFunctionalTest') {
            $fileSpec = new ServiceFunctionalTestFileSpec(
                $this->topLevelTestNamespace,
                $fileName,
                $this->rootDirectory
            );
        }

        $filePath = $fileSpec->getFilePath();
        $content = $fileSpec->getFileContent($template);

        $handler = fopen($filePath, 'x+');

        fwrite($handler, $content);
    }
}