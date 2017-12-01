<?php
namespace Davework\FileSpec\Slim;

use Davework\FileSpec\FileSpecInterface;

class FactoryTestFileSpec implements FileSpecInterface
{
    private $topLevelNamespace;
    private $className;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath)
    {
        $this->topLevelNamespace = $topLevelNamespace . '\Functional\Factory';
        $this->className = $fileName;
        $this->filePath = $baseFilePath . '/tests/Functional/Factory/' . $fileName . '.php';

        $this->associatedFiles = [];
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }

    public function getFileContent($template)
    {
        $classToTest = substr($this->className, 0, -4);
        $classToTest = 'Davework\Factory\\' . $classToTest;

        return sprintf(
            $template,
            $this->topLevelNamespace,
            $classToTest,
            $this->className,
            $classToTest,
            $classToTest
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
