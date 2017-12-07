<?php
$srcRoot = realpath(__DIR__);
$buildRoot = realpath(__DIR__);

$recursiveIterator = new RecursiveDirectoryIterator($srcRoot, FilesystemIterator::SKIP_DOTS);

$iterator = new RecursiveIteratorIterator(
    $recursiveIterator,
    RecursiveIteratorIterator::LEAVES_ONLY
);

$phar = new Phar($buildRoot . '/build/davework.phar', null, 'davework.phar');
$phar->buildFromIterator($iterator, $srcRoot);
$phar->setStub($phar->createDefaultStub("vendor/autoload.php"));
