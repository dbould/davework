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
    private $requestedType;
    private $topLevelTestNamespace;
    private $moduleNamespace;

    public function __construct($topLevelNamespace, $topLevelTestNamespace, $fileName, $baseFilePath, $requestedName, $requestedType, $module, $factoriesLiveWithClasses)
    {
        if (!is_null($module)) {
            $modulePath = '/' . $module;
            $this->moduleNamespace = '\\' . $module;
        } else {
            $modulePath = '';
            $this->moduleNamespace = '';
        }

        $this->topLevelNamespace = $topLevelNamespace;
        $this->className = $fileName;

        $this->filePath = $baseFilePath . $modulePath . '/' . '/Service/' . $fileName . '.php';

        $this->associatedFiles = [];

        if (substr($requestedName, -4) == 'Test') {
            $this->requestedName = substr($requestedName, 0, -4);
        } else {
            $this->requestedName = $requestedName;
        }

        $this->requestedType = $requestedType;
        $this->topLevelTestNamespace = $topLevelTestNamespace;
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }

    public function getFileContent($template)
    {
        $classToTest = $this->topLevelNamespace . $this->moduleNamespace . '\\' . $this->requestedType . '\\' . $this->requestedName;

        return sprintf(
            $template,
            $this->topLevelTestNamespace . '\Service',
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
