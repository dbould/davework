<?php
namespace Dbould\Davework\FileSpec\Slim;

use Dbould\Davework\FileSpec\FileSpecInterface;

class FactoryFileSpec implements FileSpecInterface
{
    private $namespace;
    private $className;
    private $associatedFiles;
    private $filePath;
    private $classToReturn;

    public function __construct($topLevelNamespace, $topLevelTestNamespace, $fileName, $baseFilePath, $requestedName, $requestedType, $module, $factoriesLiveWithClasses)
    {
        if (!is_null($module)) {
            $modulePath = $module . '/';
            $moduleNamespace = '\\' . $module;
        } else {
            $modulePath = '';
            $moduleNamespace = '';
        }

        $this->namespace = $topLevelNamespace . $moduleNamespace . '\Factory';
        $this->className = $fileName;

        $factoryFolder = $factoriesLiveWithClasses === true ? $requestedType . '/' : 'Factory/';
        $this->filePath = $baseFilePath . '/' . $modulePath . $factoryFolder . $fileName . '.php';

        $this->classToReturn = str_replace('Factory', '', $fileName);

        $this->associatedFiles = [
            FactoryTestFileSpec::class
        ];
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }

    public function getFileContent($template)
    {
        return sprintf(
            $template,
            $this->namespace,
            $this->className,
            $this->classToReturn);
    }

    public function getFilePath()
    {
        return $this->filePath;
    }
}
