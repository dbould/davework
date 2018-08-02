<?php
namespace Dbould\Davework\FileSpec\Slim;

use Dbould\Davework\FileSpec\FileSpecInterface;

class ControllerTestFileSpec implements FileSpecInterface
{
    private $topLevelNamespace;
    private $className;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath, $requestedName, $requestedType, $module, $factoriesLiveWithClasses)
    {
        $this->topLevelNamespace = $topLevelNamespace . '\Functional\Controller';
        $this->className = $fileName;

        $modulePath = !is_null($module) ? '/' . $module : '';
        $this->filePath = $baseFilePath . $modulePath . '/Controller/' . $fileName . '.php';

        $this->associatedFiles = [];
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }

    public function getFileContent($template)
    {
        return sprintf(
            $template,
            $this->topLevelNamespace,
            $this->className);
    }

    public function getFilePath()
    {
        return $this->filePath;
    }
}
