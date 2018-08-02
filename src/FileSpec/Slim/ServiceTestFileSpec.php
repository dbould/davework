<?php
namespace Dbould\Davework\FileSpec\Slim;

use Dbould\Davework\FileSpec\FileSpecInterface;

class ServiceTestFileSpec implements FileSpecInterface
{
    private $topLevelNamespace;
    private $className;
    private $filePath;
    private $associatedFiles;
    private $requestedName;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath, $requestedName, $requestedType, $module, $factoriesLiveWithClasses)
    {
        $this->topLevelNamespace = $topLevelNamespace . '\Functional\Service';
        $this->className = $fileName;

        $modulePath = !is_null($module) ? '/' . $module : '';
        $this->filePath = $baseFilePath . $modulePath . '/' . '/Service/' . $fileName . '.php';

        $this->associatedFiles = [];

        if (substr($requestedName, -4) == 'Test') {
            $this->requestedName = substr($requestedName, 0, -4);
        } else {
            $this->requestedName = $requestedName;
        }
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }

    public function getFileContent($template)
    {
        $classToTest = $this->topLevelNamespace . '\\' . $this->requestedName;

        return sprintf(
            $template,
            $this->topLevelNamespace,
            $classToTest,
            $this->className,
            $this->className
         );
    }

    public function getFilePath()
    {
        return $this->filePath;
    }
}
