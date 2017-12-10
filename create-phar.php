<?php
$buildRoot = __DIR__;

$phar = new Phar($buildRoot . '/build/davework.phar', 0, 'davework.phar');

$include = '/^(?=(.*src|.*bin|.*vendor|.*bootstrap))(?!(.*tests))(.*)$/i';

$phar->buildFromDirectory($buildRoot, $include);
$phar->setStub("#!/usr/bin/env php\n" . $phar->createDefaultStub("bin/davework"));
