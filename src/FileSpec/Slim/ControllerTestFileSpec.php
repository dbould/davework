<?php
namespace Dbould\Davework\FileSpec\Slim;

use Dbould\Davework\FileSpec\FileSpecInterface;

class ControllerTestFileSpec implements FileSpecInterface
{
    private $topLevelNamespace;
    private $className;
    private $filePath;
    private $associatedFiles;
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

        $this->filePath = $baseFilePath . $modulePath . '/Controller/' . $fileName . '.php';

        $this->associatedFiles = [];
        $this->topLevelTestNamespace = $topLevelTestNamespace;
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }

    public function getFileContent($template)
    {
        return sprintf(
            $template,
            $this->topLevelTestNamespace . $this->moduleNamespace . '\Controller',
            $this->className);
    }

    public function getFilePath()
    {
        return $this->filePath;
    }
}
