<?php
namespace Dbould\Davework\FileSpec\Slim;

use Dbould\Davework\FileSpec\FileSpecInterface;

class ServiceFileSpec implements FileSpecInterface
{
    private $namespace;
    private $className;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath, $requestedName, $requestedType, $module, $factoriesLiveWithClasses)
    {
        $this->namespace = $topLevelNamespace . '\Service';
        $this->className = $fileName;

        $modulePath = !is_null($module) ? $module . '/' : '';
        $this->filePath = $baseFilePath . '/src/' . $modulePath . 'Service/' . $fileName . '.php';

        $this->associatedFiles = [
            ServiceTestFileSpec::class,
            FactoryFileSpec::class,
            FactoryTestFileSpec::class,
        ];
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

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }
}
