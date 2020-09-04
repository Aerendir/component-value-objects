<?php
/**
 * This is an automatically generated baseline for Phan issues.
 * When Phan is invoked with --load-baseline=path/to/baseline.php,
 * The pre-existing issues listed in this file won't be emitted.
 *
 * This file can be updated by invoking Phan with --save-baseline=path/to/baseline.php
 * (can be combined with --load-baseline)
 */
return [
    // # Issue statistics:
    // PhanUndeclaredStaticMethod : 7 occurrences
    // PhanUndeclaredProperty : 4 occurrences
    // PhanParamSignatureRealMismatchHasNoParamType : 2 occurrences
    // PhanTypeMismatchArgumentProbablyReal : 2 occurrences
    // PhanTypeMismatchProperty : 2 occurrences
    // PhanUndeclaredExtendedClass : 2 occurrences
    // PhanNoopNew : 1 occurrence
    // PhanRedefinedClassReference : 1 occurrence
    // PhanTypeMismatchArgumentNullable : 1 occurrence
    // PhanTypeMismatchDeclaredParam : 1 occurrence
    // PhanUnreferencedUseNormal : 1 occurrence
    // PhanUnusedVariable : 1 occurrence
    // PhanWriteOnlyPrivateProperty : 1 occurrence

    // Currently, file_suppressions and directory_suppressions are the only supported suppressions
    'file_suppressions' => [
        'src/Money/Bridge/Twig/MoneyFormatterExtension.php' => ['PhanTypeMismatchArgumentNullable', 'PhanTypeMismatchDeclaredParam'],
        'src/Money/Money.php' => ['PhanParamSignatureRealMismatchHasNoParamType'],
        'tests/Address/Bridge/Symfony/Form/Type/AddressTypeTest.php' => ['PhanUndeclaredExtendedClass', 'PhanUndeclaredProperty', 'PhanUndeclaredStaticMethod'],
        'tests/Email/Bridge/Doctrine/EmailTypeTest.php' => ['PhanTypeMismatchArgumentProbablyReal', 'PhanTypeMismatchProperty'],
        'tests/Email/EmailTest.php' => ['PhanUnusedVariable'],
        'tests/Money/Bridge/Doctrine/MoneyTypeTest.php' => ['PhanTypeMismatchProperty', 'PhanWriteOnlyPrivateProperty'],
        'tests/Money/Bridge/Symfony/Form/Type/MoneyTypeTest.php' => ['PhanUndeclaredExtendedClass', 'PhanUndeclaredProperty', 'PhanUndeclaredStaticMethod'],
        'tests/Uri/UriTest.php' => ['PhanNoopNew'],
        'tests/Vat/VatRateTest.php' => ['PhanUnreferencedUseNormal'],
        'tests/bootstrap.php' => ['PhanRedefinedClassReference'],
    ],
    // 'directory_suppressions' => ['src/directory_name' => ['PhanIssueName1', 'PhanIssueName2']] can be manually added if needed.
    // (directory_suppressions will currently be ignored by subsequent calls to --save-baseline, but may be preserved in future Phan releases)
];
