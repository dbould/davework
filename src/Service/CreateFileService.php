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

        $className = $this->getClassNameFromType();

        $topLevelNamespace = $this->getTopLevelNamespace();

        $fileSpec = new $className(
            $topLevelNamespace,
            $fileName,
            $this->rootDirectory
        );

        $filePath = $fileSpec->getFilePath();
        $content = $fileSpec->getFileContent($template);

        $this->createFile($filePath, $content);
    }

    private function createFile($filePath, $content)
    {
        $handler = fopen($filePath, 'x+');

        fwrite($handler, $content);
    }

    private function getClassNameFromType($type)
    {
        return 'Davework\FileSpec\Slim\\' . $type . 'FileSpec';
    }

    private function getTopLevelNamespace($type)
    {
        if (substr($type, -4) === 'Test') {
            $topLevelNamespace = $this->topLevelTestNamespace;
        } else {
            $topLevelNamespace = $this->topLevelNamespace;
        }

        return $topLevelNamespace;
    }
}
