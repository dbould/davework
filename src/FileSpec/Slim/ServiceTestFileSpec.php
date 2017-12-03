<?php
namespace Davework\FileSpec\Slim;

use Davework\FileSpec\FileSpecInterface;

class ServiceTestFileSpec implements FileSpecInterface
{
    private $topLevelNamespace;
    private $className;
    private $filePath;
    private $associatedFiles;
    private $baseTestPath;

    /**
     * ServiceTestFileSpec constructor.
     * @param string $topLevelNamespace
     * @param string $fileName
     * @param string $baseFilePath
     * @param string $baseTestPath
     */
    public function __construct($topLevelNamespace, $fileName, $baseFilePath, $baseTestPath)
    {
        $this->topLevelNamespace = $topLevelNamespace . '\Functional\Service';
        $this->className = $fileName;
        $this->filePath = $baseFilePath . '/tests/Functional/Service/' . $fileName . '.php';

        $this->associatedFiles = [];
        $this->baseTestPath = $baseTestPath;
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }

    public function getFileContent($template)
    {
        $classToTest = substr($this->className, 0, -4);
        $classToTest = 'Davework\Service\\' . $classToTest;

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

    public function getClassName()
    {
        return $this->className;
    }
}