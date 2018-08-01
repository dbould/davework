<?php

namespace Davework\FileSpec;

interface FileSpecInterface
{
    public function __construct($topLevelNamespace, $fileName, $baseFilePath, $requestedName, $requestedType, $module, $factoriesLiveWithClasses);
    public function getAssociatedFiles();
    public function getFileContent($template);
    public function getFilePath();
}