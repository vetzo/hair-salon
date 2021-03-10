<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6599382b129df4e12d45dc24a76cedff
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6599382b129df4e12d45dc24a76cedff::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6599382b129df4e12d45dc24a76cedff::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
