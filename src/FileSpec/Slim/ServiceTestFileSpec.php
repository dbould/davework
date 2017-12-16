<?php
namespace Davework\FileSpec\Slim;

use Davework\FileSpec\FileSpecInterface;

class ServiceTestFileSpec implements FileSpecInterface
{
    private $topLevelNamespace;
    private $className;
    private $filePath;
    private $associatedFiles;
    private $requestedName;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath, $requestedName)
    {
        $this->topLevelNamespace = $topLevelNamespace . '\Functional\Service';
        $this->className = $fileName;
        $this->filePath = $baseFilePath . '/Service/' . $fileName . '.php';

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
        $classToTest = 'Davework\Service\\' . $this->requestedName;

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
