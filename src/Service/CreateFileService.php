<?php
namespace Davework\Service;

class CreateFileService implements CreateFileInterface
{
    private $templateService;
    private $fileSpecTypeService;

    /**
     * CreateFileService constructor.
     * @param TemplateService $templateService
     * @param FileSpecTypeService $fileSpecTypeService
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
        $className = $this->getClassNameFromType($type);
        $topLevelNamespace = $this->fileSpecTypeService->getTopLevelNamespace($type);

        $fileSpec = $this->generateFile($className, $type, $topLevelNamespace, $fileName . $type);

        $associatedFiles = $fileSpec->getAssociatedFiles();
        $requestedType = $type;

        foreach ($associatedFiles as $file) {
            $type = $this->fileSpecTypeService->getTypeFromFileName($file);

            $topLevelNamespace = $this->fileSpecTypeService->getTopLevelNamespace($type);

            $associatedFileName = (strpos($type, $requestedType) !== false)? $type:$requestedType . $type;
            $associatedFileName = $fileName . $associatedFileName;

            $this->generateFile($file, $type, $topLevelNamespace, $associatedFileName);
        }
    }

    private function generateFile($file, $type, $topLevelNamespace, $fileName)
    {
        $rootDirectory = $this->fileSpecTypeService->getRootDirectory($type);

        $fileSpec = new $file(
            $topLevelNamespace,
            $fileName,
            $rootDirectory
        );

        $template = $this->templateService->getTemplate($type);

        $filePath = $fileSpec->getFilePath();
        $content = $fileSpec->getFileContent($template);

        $this->createFile($filePath, $content);

        return $fileSpec;
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
