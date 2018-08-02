<?php
namespace Dbould\Davework\FileSpec\Slim;

use Dbould\Davework\FileSpec\FileSpecInterface;

class FactoryTestFileSpec implements FileSpecInterface
{
    private $topLevelNamespace;
    private $className;
    private $filePath;
    private $associatedFiles;
    private $typeToTest;
    private $requestedName;
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

        $factoryFolder = $factoriesLiveWithClasses === true ? '/' . $requestedType . '/' : '/Factory/';
        $this->filePath = $baseFilePath . $modulePath . $factoryFolder . $fileName . '.php';

        $this->typeToTest = $requestedType;

        $this->associatedFiles = [];

        if (substr($requestedName, -4) == 'Test') {
            $this->requestedName = substr($requestedName, 0, -4);
        } else {
            $this->requestedName = $requestedName;
        }

        $this->topLevelTestNamespace = $topLevelTestNamespace;
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }

    public function getFileContent($template)
    {
        $classToTest = $this->topLevelNamespace . $this->moduleNamespace . '\\' . $this->typeToTest . '\\' . $this->requestedName;

        return sprintf(
            $template,
            $this->topLevelTestNamespace . '\Factory',
            $classToTest,
            $this->className,
            $this->requestedName,
            $this->requestedName
        );
    }

    public function getFilePath()
    {
        return $this->filePath;
    }
}
