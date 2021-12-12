<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit72cf1598930b5e470732358ac6906da6
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Socketlabs\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Socketlabs\\' => 
        array (
            0 => __DIR__ . '/..' . '/socketlabs/email-delivery/InjectionApi/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit72cf1598930b5e470732358ac6906da6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit72cf1598930b5e470732358ac6906da6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit72cf1598930b5e470732358ac6906da6::$classMap;

        }, null, ClassLoader::class);
    }
}
