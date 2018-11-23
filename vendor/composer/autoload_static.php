<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit69d9ee672ba2e8d57749ede9ff84da2e
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
            'Symfony\\Component\\Yaml\\' => 23,
            'Symfony\\Component\\Validator\\' => 28,
            'Symfony\\Component\\Translation\\' => 30,
            'Symfony\\Component\\Finder\\' => 25,
            'Symfony\\Component\\Filesystem\\' => 29,
            'Symfony\\Component\\Console\\' => 26,
            'Symfony\\Component\\Config\\' => 25,
            'Slim\\Views\\' => 11,
            'Slim\\' => 5,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Container\\' => 14,
        ),
        'I' => 
        array (
            'Interop\\Container\\' => 18,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Symfony\\Component\\Yaml\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/yaml',
        ),
        'Symfony\\Component\\Validator\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/validator',
        ),
        'Symfony\\Component\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation',
        ),
        'Symfony\\Component\\Finder\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/finder',
        ),
        'Symfony\\Component\\Filesystem\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/filesystem',
        ),
        'Symfony\\Component\\Console\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/console',
        ),
        'Symfony\\Component\\Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/config',
        ),
        'Slim\\Views\\' => 
        array (
            0 => __DIR__ . '/..' . '/slim/twig-view/src',
        ),
        'Slim\\' => 
        array (
            0 => __DIR__ . '/..' . '/slim/slim/Slim',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Interop\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/container-interop/container-interop/src/Interop/Container',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
        'P' => 
        array (
            'Propel' => 
            array (
                0 => __DIR__ . '/..' . '/propel/propel/src',
            ),
            'Pimple' => 
            array (
                0 => __DIR__ . '/..' . '/pimple/pimple/src',
            ),
        ),
    );

    public static $classMap = array (
        'Address' => __DIR__ . '/../..' . '/models/Address.php',
        'AddressQuery' => __DIR__ . '/../..' . '/models/AddressQuery.php',
        'Amenity' => __DIR__ . '/../..' . '/models/Amenity.php',
        'AmenityQuery' => __DIR__ . '/../..' . '/models/AmenityQuery.php',
        'Appliance' => __DIR__ . '/../..' . '/models/Appliance.php',
        'ApplianceQuery' => __DIR__ . '/../..' . '/models/ApplianceQuery.php',
        'Authentication' => __DIR__ . '/../..' . '/models/Authentication.php',
        'AuthenticationQuery' => __DIR__ . '/../..' . '/models/AuthenticationQuery.php',
        'Base\\Address' => __DIR__ . '/../..' . '/models/Base/Address.php',
        'Base\\AddressQuery' => __DIR__ . '/../..' . '/models/Base/AddressQuery.php',
        'Base\\Amenity' => __DIR__ . '/../..' . '/models/Base/Amenity.php',
        'Base\\AmenityQuery' => __DIR__ . '/../..' . '/models/Base/AmenityQuery.php',
        'Base\\Appliance' => __DIR__ . '/../..' . '/models/Base/Appliance.php',
        'Base\\ApplianceQuery' => __DIR__ . '/../..' . '/models/Base/ApplianceQuery.php',
        'Base\\Authentication' => __DIR__ . '/../..' . '/models/Base/Authentication.php',
        'Base\\AuthenticationQuery' => __DIR__ . '/../..' . '/models/Base/AuthenticationQuery.php',
        'Base\\Cost' => __DIR__ . '/../..' . '/models/Base/Cost.php',
        'Base\\CostQuery' => __DIR__ . '/../..' . '/models/Base/CostQuery.php',
        'Base\\Email' => __DIR__ . '/../..' . '/models/Base/Email.php',
        'Base\\EmailQuery' => __DIR__ . '/../..' . '/models/Base/EmailQuery.php',
        'Base\\Fee' => __DIR__ . '/../..' . '/models/Base/Fee.php',
        'Base\\FeeQuery' => __DIR__ . '/../..' . '/models/Base/FeeQuery.php',
        'Base\\Issue' => __DIR__ . '/../..' . '/models/Base/Issue.php',
        'Base\\IssueQuery' => __DIR__ . '/../..' . '/models/Base/IssueQuery.php',
        'Base\\Limitation' => __DIR__ . '/../..' . '/models/Base/Limitation.php',
        'Base\\LimitationQuery' => __DIR__ . '/../..' . '/models/Base/LimitationQuery.php',
        'Base\\Lives' => __DIR__ . '/../..' . '/models/Base/Lives.php',
        'Base\\LivesQuery' => __DIR__ . '/../..' . '/models/Base/LivesQuery.php',
        'Base\\Money' => __DIR__ . '/../..' . '/models/Base/Money.php',
        'Base\\MoneyQuery' => __DIR__ . '/../..' . '/models/Base/MoneyQuery.php',
        'Base\\Owed' => __DIR__ . '/../..' . '/models/Base/Owed.php',
        'Base\\OwedQuery' => __DIR__ . '/../..' . '/models/Base/OwedQuery.php',
        'Base\\Payment' => __DIR__ . '/../..' . '/models/Base/Payment.php',
        'Base\\PaymentQuery' => __DIR__ . '/../..' . '/models/Base/PaymentQuery.php',
        'Base\\Phone' => __DIR__ . '/../..' . '/models/Base/Phone.php',
        'Base\\PhoneQuery' => __DIR__ . '/../..' . '/models/Base/PhoneQuery.php',
        'Base\\Picture' => __DIR__ . '/../..' . '/models/Base/Picture.php',
        'Base\\PictureQuery' => __DIR__ . '/../..' . '/models/Base/PictureQuery.php',
        'Base\\Property' => __DIR__ . '/../..' . '/models/Base/Property.php',
        'Base\\PropertyQuery' => __DIR__ . '/../..' . '/models/Base/PropertyQuery.php',
        'Base\\Tenant' => __DIR__ . '/../..' . '/models/Base/Tenant.php',
        'Base\\TenantQuery' => __DIR__ . '/../..' . '/models/Base/TenantQuery.php',
        'Base\\User' => __DIR__ . '/../..' . '/models/Base/User.php',
        'Base\\UserQuery' => __DIR__ . '/../..' . '/models/Base/UserQuery.php',
        'Base\\Utility' => __DIR__ . '/../..' . '/models/Base/Utility.php',
        'Base\\UtilityQuery' => __DIR__ . '/../..' . '/models/Base/UtilityQuery.php',
        'Cost' => __DIR__ . '/../..' . '/models/Cost.php',
        'CostQuery' => __DIR__ . '/../..' . '/models/CostQuery.php',
        'Email' => __DIR__ . '/../..' . '/models/Email.php',
        'EmailQuery' => __DIR__ . '/../..' . '/models/EmailQuery.php',
        'Fee' => __DIR__ . '/../..' . '/models/Fee.php',
        'FeeQuery' => __DIR__ . '/../..' . '/models/FeeQuery.php',
        'Issue' => __DIR__ . '/../..' . '/models/Issue.php',
        'IssueQuery' => __DIR__ . '/../..' . '/models/IssueQuery.php',
        'Limitation' => __DIR__ . '/../..' . '/models/Limitation.php',
        'LimitationQuery' => __DIR__ . '/../..' . '/models/LimitationQuery.php',
        'Lives' => __DIR__ . '/../..' . '/models/Lives.php',
        'LivesQuery' => __DIR__ . '/../..' . '/models/LivesQuery.php',
        'Map\\AddressTableMap' => __DIR__ . '/../..' . '/models/Map/AddressTableMap.php',
        'Map\\AmenityTableMap' => __DIR__ . '/../..' . '/models/Map/AmenityTableMap.php',
        'Map\\ApplianceTableMap' => __DIR__ . '/../..' . '/models/Map/ApplianceTableMap.php',
        'Map\\AuthenticationTableMap' => __DIR__ . '/../..' . '/models/Map/AuthenticationTableMap.php',
        'Map\\CostTableMap' => __DIR__ . '/../..' . '/models/Map/CostTableMap.php',
        'Map\\EmailTableMap' => __DIR__ . '/../..' . '/models/Map/EmailTableMap.php',
        'Map\\FeeTableMap' => __DIR__ . '/../..' . '/models/Map/FeeTableMap.php',
        'Map\\IssueTableMap' => __DIR__ . '/../..' . '/models/Map/IssueTableMap.php',
        'Map\\LimitationTableMap' => __DIR__ . '/../..' . '/models/Map/LimitationTableMap.php',
        'Map\\LivesTableMap' => __DIR__ . '/../..' . '/models/Map/LivesTableMap.php',
        'Map\\MoneyTableMap' => __DIR__ . '/../..' . '/models/Map/MoneyTableMap.php',
        'Map\\OwedTableMap' => __DIR__ . '/../..' . '/models/Map/OwedTableMap.php',
        'Map\\PaymentTableMap' => __DIR__ . '/../..' . '/models/Map/PaymentTableMap.php',
        'Map\\PhoneTableMap' => __DIR__ . '/../..' . '/models/Map/PhoneTableMap.php',
        'Map\\PictureTableMap' => __DIR__ . '/../..' . '/models/Map/PictureTableMap.php',
        'Map\\PropertyTableMap' => __DIR__ . '/../..' . '/models/Map/PropertyTableMap.php',
        'Map\\TenantTableMap' => __DIR__ . '/../..' . '/models/Map/TenantTableMap.php',
        'Map\\UserTableMap' => __DIR__ . '/../..' . '/models/Map/UserTableMap.php',
        'Map\\UtilityTableMap' => __DIR__ . '/../..' . '/models/Map/UtilityTableMap.php',
        'Money' => __DIR__ . '/../..' . '/models/Money.php',
        'MoneyQuery' => __DIR__ . '/../..' . '/models/MoneyQuery.php',
        'Owed' => __DIR__ . '/../..' . '/models/Owed.php',
        'OwedQuery' => __DIR__ . '/../..' . '/models/OwedQuery.php',
        'Payment' => __DIR__ . '/../..' . '/models/Payment.php',
        'PaymentQuery' => __DIR__ . '/../..' . '/models/PaymentQuery.php',
        'Phone' => __DIR__ . '/../..' . '/models/Phone.php',
        'PhoneQuery' => __DIR__ . '/../..' . '/models/PhoneQuery.php',
        'Picture' => __DIR__ . '/../..' . '/models/Picture.php',
        'PictureQuery' => __DIR__ . '/../..' . '/models/PictureQuery.php',
        'Property' => __DIR__ . '/../..' . '/models/Property.php',
        'PropertyQuery' => __DIR__ . '/../..' . '/models/PropertyQuery.php',
        'Tenant' => __DIR__ . '/../..' . '/models/Tenant.php',
        'TenantQuery' => __DIR__ . '/../..' . '/models/TenantQuery.php',
        'User' => __DIR__ . '/../..' . '/models/User.php',
        'UserQuery' => __DIR__ . '/../..' . '/models/UserQuery.php',
        'Utility' => __DIR__ . '/../..' . '/models/Utility.php',
        'UtilityQuery' => __DIR__ . '/../..' . '/models/UtilityQuery.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit69d9ee672ba2e8d57749ede9ff84da2e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit69d9ee672ba2e8d57749ede9ff84da2e::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit69d9ee672ba2e8d57749ede9ff84da2e::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit69d9ee672ba2e8d57749ede9ff84da2e::$classMap;

        }, null, ClassLoader::class);
    }
}
