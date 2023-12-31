<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7c007314bcac7ac5c3f7b2c99a8237fa
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Thaly\\mvc\\app\\model\\' => 20,
            'Thaly\\mvc\\app\\lib\\database\\' => 27,
            'Thaly\\mvc\\app\\controller\\' => 25,
            'Thaly\\mvc\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Thaly\\mvc\\app\\model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/model',
        ),
        'Thaly\\mvc\\app\\lib\\database\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/lib/database',
        ),
        'Thaly\\mvc\\app\\controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/controller',
        ),
        'Thaly\\mvc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7c007314bcac7ac5c3f7b2c99a8237fa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7c007314bcac7ac5c3f7b2c99a8237fa::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7c007314bcac7ac5c3f7b2c99a8237fa::$classMap;

        }, null, ClassLoader::class);
    }
}
