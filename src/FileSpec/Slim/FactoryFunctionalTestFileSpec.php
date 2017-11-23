<?php
namespace Davework\FileSpec\Slim;

use Davework\FileSpec\FileSpecInterface;

class FactoryFunctionalTestFileSpec implements FileSpecInterface
{
    private $topLevelNamespace;
    private $className;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath)
    {
        $this->topLevelNamespace = $topLevelNamespace . '\Functional\Factory';
        $this->className = $fileName . 'Factory';
        $this->filePath = $baseFilePath . '/tests/Factory/' . $fileName . 'FactoryTest.php';

        $this->associatedFiles = [];
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }

    public function getFileContent($template)
    {
        $classToTest = 'Davework\Factory\\' . $this->className;

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
