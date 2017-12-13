<?php
namespace Davework\FileSpec\Slim;

use Davework\FileSpec\FileSpecInterface;

class FactoryTestFileSpec implements FileSpecInterface
{
    private $topLevelNamespace;
    private $className;
    private $filePath;
    private $associatedFiles;
    private $typeToTest;
    /**
     * @var
     */
    private $requestedName;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath, $requestedName, $requestedType)
    {
        $this->topLevelNamespace = $topLevelNamespace . '\Functional\Factory';
        $this->className = $fileName;
        $this->filePath = $baseFilePath . '/Factory/' . $fileName . '.php';
        $this->typeToTest = $requestedType;

        $this->associatedFiles = [];
        $this->requestedName = $requestedName;
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }

    public function getFileContent($template)
    {
        $classToTest = substr($this->requestedName, 0, -4);
        $classToTest = 'Davework\\' . $this->typeToTest . '\\' . $this->requestedName;

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
}
