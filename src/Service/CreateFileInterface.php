<?php
namespace Dbould\Davework\Service;

interface CreateFileInterface
{
    public function create($fileName, $type, $module = null);
}