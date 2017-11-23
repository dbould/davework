<?php

namespace Davework\FileSpec;

interface FileSpecInterface
{

    public function getAssociatedFiles();
    public function getFileContent($template);
    public function getFilePath();
    public function getClassName();
}