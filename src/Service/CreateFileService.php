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
        FileSpecTypeService $fileSpecTypeService
    )
    {
        $this->templateService = $templateService;
        $this->fileSpecTypeService = $fileSpecTypeService;
    }

    public function create($fileName, $type)
    {
        $template = $this->templateService->getTemplate($type);
        $className = $this->getClassNameFromType($type);
        $topLevelNamespace = $this->fileSpecTypeService->getTopLevelNamespace($type);

        $rootDirectory = $this->fileSpecTypeService->getRootDirectory($type);

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
            $type = $this->fileSpecTypeService->getTypeFromFileName($file);

            $topLevelNamespace = $this->fileSpecTypeService->getTopLevelNamespace($type);

            $associatedFileName = (strpos($type, $requestedType) !== false)? $type:$requestedType . $type;
            $associatedFileName = $fileName . $associatedFileName;

            $rootDirectory = $this->fileSpecTypeService->getRootDirectory($type);

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
}
