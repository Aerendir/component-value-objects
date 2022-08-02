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
    // PhanUndeclaredStaticMethod : 160+ occurrences
    // PhanRedefinedExtendedClass : 10+ occurrences
    // PhanUndeclaredMethod : 7 occurrences
    // PhanTypeMismatchArgumentProbablyReal : 1 occurrence
    // PhanTypeMismatchReturnSuperType : 1 occurrence

    // Currently, file_suppressions and directory_suppressions are the only supported suppressions
    'file_suppressions' => [
        'src/Uri/Bridge/Doctrine/UriType.php' => ['PhanTypeMismatchReturnSuperType'],
        'tests/Address/AddressTest.php' => ['PhanRedefinedExtendedClass', 'PhanUndeclaredStaticMethod'],
        'tests/Address/Bridge/Symfony/Form/Type/AddressTypeTest.php' => ['PhanUndeclaredStaticMethod'],
        'tests/Email/Bridge/Doctrine/EmailTypeTest.php' => ['PhanRedefinedExtendedClass', 'PhanUndeclaredMethod', 'PhanUndeclaredStaticMethod'],
        'tests/Email/EmailTest.php' => ['PhanRedefinedExtendedClass', 'PhanUndeclaredMethod', 'PhanUndeclaredStaticMethod'],
        'tests/Ip/IpTest.php' => ['PhanRedefinedExtendedClass', 'PhanUndeclaredStaticMethod'],
        'tests/Money/Bridge/Doctrine/MoneyTypeTest.php' => ['PhanRedefinedExtendedClass', 'PhanUndeclaredMethod', 'PhanUndeclaredStaticMethod'],
        'tests/Money/Bridge/Symfony/Form/Type/MoneyTypeTest.php' => ['PhanUndeclaredStaticMethod'],
        'tests/Money/MoneyTest.php' => ['PhanRedefinedExtendedClass', 'PhanUndeclaredStaticMethod'],
        'tests/Payment/PaymentTest.php' => ['PhanRedefinedExtendedClass', 'PhanUndeclaredStaticMethod'],
        'tests/Phone/PhoneTest.php' => ['PhanRedefinedExtendedClass', 'PhanUndeclaredStaticMethod'],
        'tests/Tax/TaxTest.php' => ['PhanRedefinedExtendedClass', 'PhanUndeclaredMethod', 'PhanUndeclaredStaticMethod'],
        'tests/Uri/UriTest.php' => ['PhanRedefinedExtendedClass', 'PhanTypeMismatchArgumentProbablyReal', 'PhanUndeclaredMethod', 'PhanUndeclaredStaticMethod'],
        'tests/Vat/VatNumberTest.php' => ['PhanRedefinedExtendedClass', 'PhanUndeclaredStaticMethod'],
        'tests/Vat/VatRateTest.php' => ['PhanRedefinedExtendedClass', 'PhanUndeclaredStaticMethod'],
    ],
    // 'directory_suppressions' => ['src/directory_name' => ['PhanIssueName1', 'PhanIssueName2']] can be manually added if needed.
    // (directory_suppressions will currently be ignored by subsequent calls to --save-baseline, but may be preserved in future Phan releases)
];
