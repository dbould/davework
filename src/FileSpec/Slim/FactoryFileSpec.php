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
        $this->namespace = $topLevelNamespace . '\Factory';
        $this->className = $fileName;

        $modulePath = !is_null($module) ? $module . '/' : '';
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
