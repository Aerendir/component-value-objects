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
use Rector\Core\ValueObject\PhpVersion;
use Rector\TypeDeclaration\Rector\ClassMethod\AddParamTypeFromPropertyTypeRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromAssignsRector;
use SerendipityHQ\Integration\Rector\SerendipityHQ;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->phpVersion(PhpVersion::PHP_74);
    $rectorConfig->paths([__DIR__ . '/src', __DIR__ . '/tests']);
    $rectorConfig->bootstrapFiles([__DIR__ . '/vendor-bin/phpunit/vendor/autoload.php']);
    $rectorConfig->import(SerendipityHQ::SHQ_LIBRARY);

    $toSkip   = SerendipityHQ::buildToSkip(SerendipityHQ::SHQ_LIBRARY_SKIP);
    $toSkip[] = TypedPropertyFromAssignsRector::class;
    $toSkip[] = AddParamTypeFromPropertyTypeRector::class;
    $rectorConfig->skip($toSkip);
};
