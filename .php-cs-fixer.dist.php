<?php

$header = <<<EOF
This file is part of the Serendipity HQ Value Objects Component.

Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;
$rules = include \SerendipityHQ\Integration\PhpCsFixer\SerendipityHQ::SHQ_LIBRARY;

$rector = PhpCsFixer\Finder::create()
->in(__DIR__)->depth('== 0')->files()->name(['rector.php'])
->getIterator();

$phan = PhpCsFixer\Finder::create()
->in(__DIR__ . '/.phan')
->getIterator();

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__.'/src',
        __DIR__.'/tests',
    ])
    ->append($rector)
    ->append($phan);

$config = new PhpCsFixer\Config();
return $config
    ->setFinder($finder)
    ->setUsingCache(true)
    ->setCacheFile(__DIR__.'/var/cache/.php_cs.cache')
    ->setRiskyAllowed(true)
    ->setRules($rules);
