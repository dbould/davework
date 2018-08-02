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

    public function __construct($topLevelNamespace, $topLevelTestNamespace, $fileName, $baseFilePath, $requestedName, $requestedType, $module, $factoriesLiveWithClasses)
    {
        $this->topLevelNamespace = $topLevelNamespace;
        $this->className = $fileName;

        $modulePath = !is_null($module) ? '/' . $module : '';
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
            $this->topLevelTestNamespace . '\Functional\Controller',
            $this->className);
    }

    public function getFilePath()
    {
        return $this->filePath;
    }
}
