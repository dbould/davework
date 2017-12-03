<?php

namespace Davework\Service;

class CreateFileService implements CreateFileInterface
{
    private $templateService;
    private $topLevelNamespace;
    private $topLevelTestNamespace;
    private $rootDirectory;
    private $testRootDirectory;
    private $fileSpecTypeService;

    /**
     * CreateFileService constructor.
     * @param TemplateService $templateService
     * @param FileSpecTypeService $fileSpecTypeService
     * @param $topLevelNamespace
     * @param $topLevelTestNamespace
     * @param $rootDirectory
     * @param $testRootDirectory
     */
    public function __construct(
        TemplateService $templateService,
        FileSpecTypeService $fileSpecTypeService,
        $topLevelNamespace,
        $topLevelTestNamespace,
        $rootDirectory,
        $testRootDirectory
    )
    {
        $this->templateService = $templateService;
        $this->topLevelNamespace = $topLevelNamespace;
        $this->topLevelTestNamespace = $topLevelTestNamespace;
        $this->rootDirectory = $rootDirectory;
        $this->testRootDirectory = $testRootDirectory;
        $this->fileSpecTypeService = $fileSpecTypeService;
    }

    public function create($fileName, $type)
    {
        $template = $this->templateService->getTemplate($type);
        $className = $this->getClassNameFromType($type);
        $topLevelNamespace = $this->getTopLevelNamespace($type);

        $rootDirectory = $this->fileSpecTypeService->getRootDirectory($type, $this->rootDirectory, $this->testRootDirectory);

        $fileSpec = new $className(
            $topLevelNamespace,
            $fileName . $type,
            $rootDirectory
        );

        $associatedFiles = $fileSpec->getAssociatedFiles();

        $filePath = $fileSpec->getFilePath();
        $content = $fileSpec->getFileContent($template);

        $this->createFile($filePath, $content);

        $requestedType = $type;

        foreach ($associatedFiles as $file) {
            $classArray = explode('\\', $file);
            $type = array_pop($classArray);
            $type = str_replace('FileSpec', '', $type);

            $topLevelNamespace = $this->getTopLevelNamespace($type);

            $associatedFileName = (strpos($type, $requestedType) !== false)? $type:$requestedType . $type;
            $associatedFileName = $fileName . $associatedFileName;

            $rootDirectory = $this->fileSpecTypeService->getRootDirectory($type, $this->rootDirectory, $this->testRootDirectory);

            $fileSpec = new $file(
                $topLevelNamespace,
                $associatedFileName,
                $rootDirectory
            );

            $template = $this->templateService->getTemplate($type);

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
