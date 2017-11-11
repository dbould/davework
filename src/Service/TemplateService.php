<?php

namespace Davework\Service;

class TemplateService
{
    public function __construct()
    {

    }

    public function getTemplate($templateName)
    {
        $filePath = sprintf(__DIR__ . '/../PhpTemplates/%s.php', $templateName);

        return require $filePath;
    }
}