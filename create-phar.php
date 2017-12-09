<?php

$buildRoot = __DIR__;

$phar = new Phar($buildRoot . '/build/davework.phar', 0, 'davework.phar');

$exclude = '/^(?=(.*src|.*bin|.*vendor|.*bootstrap))(?!(.*tests))(.*)$/i';

$phar->buildFromDirectory($buildRoot, $exclude);
$phar->setStub($phar->createDefaultStub("bin/davework"));
