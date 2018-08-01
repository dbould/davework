<?php
namespace Davework\Service;

use Davework\FileSpec\FileSpecInterface;

class CreateFileService implements CreateFileInterface
{
    private $templateService;
    private $fileSpecTypeService;
    private $factoriesLiveWithClasses;

    /**
     * CreateFileService constructor.
     * @param TemplateService $templateService
     * @param FileSpecTypeService $fileSpecTypeService
     */
    public function __construct(TemplateService $templateService, FileSpecTypeService $fileSpecTypeService, $factoriesLiveWithClasses)
    {
        $this->templateService = $templateService;
        $this->fileSpecTypeService = $fileSpecTypeService;
        $this->factoriesLiveWithClasses = $factoriesLiveWithClasses;
    }

    /**
     * @param $fileName
     * @param $type
     */
    public function create($fileName, $type, $module = null)
    {
        $className = $this->getClassNameFromType($type);

        $fileSpec = $this->generateFile(
            $className,
            $type,
            $fileName . $type,
            $fileName . $type,
            'Factory',
            $module
        );

        $associatedFiles = $fileSpec->getAssociatedFiles();
        $requestedName = $fileName . $type;
        $requestedType = $type;

        foreach ($associatedFiles as $className) {
            $type = $this->fileSpecTypeService->getTypeFromFileName($className);

            $associatedFileName = (strpos($type, $requestedType) !== false)? $type:$requestedType . $type;
            $associatedFileName = $fileName . $associatedFileName;

            $this->generateFile($className, $type, $associatedFileName, $requestedName, $requestedType, $module);
        }
    }

    /**
     * @param $className
     * @param $type
     * @param $fileName
     * @return FileSpecInterface mixed
     */
    private function generateFile($className, $type, $fileName, $requestedName, $requestedType, $module)
    {
        $rootDirectory = $this->fileSpecTypeService->getRootDirectory($type);
        $topLevelNamespace = $this->fileSpecTypeService->getTopLevelNamespace($type);

        $fileSpec = new $className(
            $topLevelNamespace,
            $fileName,
            $rootDirectory,
            $requestedName,
            $requestedType,
            $module,
            $this->factoriesLiveWithClasses
        );

        $template = $this->templateService->getTemplate($type);

        $filePath = $fileSpec->getFilePath();
        $content = $fileSpec->getFileContent($template);

        $this->createFile($filePath, $content);

        return $fileSpec;
    }

    /**
     * @param $filePath
     * @param $content
     */
    private function createFile($filePath, $content)
    {
        $handler = fopen($filePath, 'x+');

        fwrite($handler, $content);
    }

    /**
     * @param $type
     * @return string
     */
    private function getClassNameFromType($type)
    {
        return 'Davework\FileSpec\Slim\\' . $type . 'FileSpec';
    }
}
