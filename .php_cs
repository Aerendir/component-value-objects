<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude([
        'build',
        'docs',
        'vendor',
    ])
    ->in(__DIR__.'/src')
    ->in(__DIR__.'/tests');

$header = <<<EOF
This file is part of PHP Value Objects.

Copyright Adamo Aerendir Crespi 2015-2017.

@author    Adamo Aerendir Crespi <hello@aerendir.me>
@copyright Copyright (C) 2015 - 2020 Aerendir. All rights reserved.
@license   MIT
EOF;

return PhpCsFixer\Config::create()
    ->setFinder($finder)
    ->setUsingCache(true)
    ->setRiskyAllowed(true)
    ->setRules([
        'header_comment' => ['header' => $header],
        '@Symfony' => true,

        // Symfony overwritings
        'binary_operator_spaces' => [
            'align_double_arrow' => true,
            'align_equals' => true,
        ],
        'concat_space' => ['spacing' => 'one'],
        'phpdoc_to_comment' => false,

        // Other rules
        'align_multiline_comment' => true,
        'array_syntax' => ['syntax' => 'short'],
        'blank_line_before_return' => true,
        'combine_consecutive_unsets' => true,
        'linebreak_after_opening_tag' => true,
        'list_syntax' => ['syntax' => 'short'],
        'no_multiline_whitespace_before_semicolons' => true,
        'no_null_property_initialization' => true,
        'no_short_echo_tag' => true,
        'no_superfluous_phpdoc_tags' => false,
        'no_unreachable_default_argument_value' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'not_operator_with_space' => true,
        'not_operator_with_successor_space' => true,
        'ordered_class_elements' => [
            'use_trait',
            'constant_public',
            'constant_protected',
            'constant_private',
            'property_public',
            'property_protected',
            'property_private',
            'construct',
            'phpunit',
            'method_public',
            'method_protected',
            'method_private',
            'destruct',
            'magic'
        ],
        'ordered_imports' => true,
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_order' => true,
        'phpdoc_types_order' => ['null_adjustment' => 'always_last'],
        'single_line_comment_style' => ['comment_types' => ['hash']],
        'strict_comparison' => true
    ]);
