<?php

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__.'/src',
        __DIR__.'/tests'
    ]);

$header = <<<EOF
This file is part of the Serendipity HQ Value Objects Component.

Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

$config = new PhpCsFixer\Config();
return $config
    ->setFinder($finder)
    ->setUsingCache(true)
    ->setCacheFile(__DIR__.'/var/cache/.php_cs.cache')
    ->setRiskyAllowed(true)
    ->setRules([
        'header_comment' => ['header' => $header],
        '@Symfony' => true,

        // Symfony overwritings
        'binary_operator_spaces' => [
            'operators' => [
                '=' => 'align',
                '=>' => 'align',
            ]
        ],
        'concat_space' => ['spacing' => 'one'],
        'phpdoc_to_comment' => false,

        // Other rules
        'align_multiline_comment' => true,
        'array_syntax' => ['syntax' => 'short'],
        'blank_line_before_statement' => true,
        'class_attributes_separation' => [
            'elements' => [
                'method' => 'one',
            ]
        ],
        'combine_consecutive_unsets' => true,
        'linebreak_after_opening_tag' => true,
        'list_syntax' => ['syntax' => 'short'],
        'no_null_property_initialization' => true,
        'no_superfluous_phpdoc_tags' => [
            'allow_mixed' => true,
        ],
        'no_unreachable_default_argument_value' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'not_operator_with_space' => true,
        'not_operator_with_successor_space' => true,
        'ordered_imports' => true,
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_line_span' => [
            'const' => 'single',
            'method' => 'multi',
            'property' => 'single',
        ],
        'phpdoc_order' => true,
        'phpdoc_types_order' => ['null_adjustment' => 'always_last'],
        'single_line_comment_style' => ['comment_types' => ['hash']],
        'strict_comparison' => true,
    ]);
