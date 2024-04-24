<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8d070178755c320c69f93ee4800660ef
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Interfaces\\' => 11,
        ),
        'D' => 
        array (
            'Database\\' => 9,
        ),
        'C' => 
        array (
            'Config\\' => 7,
            'Class\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Interfaces\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Interfaces',
        ),
        'Database\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Database',
        ),
        'Config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Config',
        ),
        'Class\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Class',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8d070178755c320c69f93ee4800660ef::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8d070178755c320c69f93ee4800660ef::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8d070178755c320c69f93ee4800660ef::$classMap;

        }, null, ClassLoader::class);
    }
}
