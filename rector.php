<?php

declare(strict_types=1);

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\ClassMethod\AddParamTypeFromPropertyTypeRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromAssignsRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;
use Rector\ValueObject\PhpVersion;
use SerendipityHQ\Integration\Rector\SerendipityHQ;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->phpVersion(PhpVersion::PHP_82);
    $rectorConfig->paths([__DIR__ . '/src', __DIR__ . '/tests']);
    $rectorConfig->bootstrapFiles([__DIR__ . '/vendor-bin/phpunit/vendor/autoload.php']);
    $rectorConfig->import(SerendipityHQ::SHQ_LIBRARY);

    $toSkip   = SerendipityHQ::buildToSkip(SerendipityHQ::SHQ_LIBRARY_SKIP);
    $toSkip[] = TypedPropertyFromAssignsRector::class;
    $toSkip[] = AddParamTypeFromPropertyTypeRector::class;

    // Money::$humanAmount starts as null and is set to a float, an int or a string before the constructor casts it:
    // the type Rector infers from the constructor alone would throw a TypeError.
    $toSkip[TypedPropertyFromStrictConstructorRector::class] = [__DIR__ . '/src/Money/Money.php'];
    $rectorConfig->skip($toSkip);
};
