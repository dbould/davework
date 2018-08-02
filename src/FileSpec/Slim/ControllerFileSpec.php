<?php
namespace Dbould\Davework\FileSpec\Slim;

use Dbould\Davework\FileSpec\FileSpecInterface;

class ControllerFileSpec implements FileSpecInterface
{
    private $namespace;
    private $className;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $topLevelTestNamespace, $fileName, $baseFilePath, $requestedName, $requestedType, $module, $factoriesLiveWithClasses)
    {
        if (!is_null($module)) {
            $modulePath = $module . '/';
            $moduleNamespace = '\\' . $module;
        } else {
            $modulePath = '';
            $moduleNamespace = '';
        }

        $this->namespace = $topLevelNamespace . $moduleNamespace . '\Controller';
        $this->className = $fileName;

        $this->filePath = $baseFilePath . '/' . $modulePath . 'Controller/' . $fileName . '.php';

        $this->associatedFiles = [
            ControllerTestFileSpec::class,
            FactoryFileSpec::class,
            FactoryTestFileSpec::class,
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
            $this->className);
    }

    public function getFilePath()
    {
        return $this->filePath;
    }
}
