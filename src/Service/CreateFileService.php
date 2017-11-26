<?php

namespace Davework\Service;

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
        $className = $this->getClassNameFromType($type);
        $topLevelNamespace = $this->getTopLevelNamespace($type);

        $fileSpec = new $className(
            $topLevelNamespace,
            $fileName,
            $this->rootDirectory
        );

        $associatedFiles = $fileSpec->getAssociatedFiles();

        $filePath = $fileSpec->getFilePath();
        $content = $fileSpec->getFileContent($template);

        $this->createFile($filePath, $content);

        foreach ($associatedFiles as $file) {
            $topLevelNamespace = $this->getTopLevelNamespace($type);

            $fileSpec = new $file(
                $topLevelNamespace,
                $fileName,
                $this->rootDirectory
            );

            $filePath = $fileSpec->getFilePath();
            $content = $fileSpec->getFileContent($template);

            $this->createFile($filePath, $content);
        }
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
