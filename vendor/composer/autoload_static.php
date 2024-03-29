<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit841622f28ef8fc7fb006338c95a58c43
{
    public static $files = array (
        '71ecd0286a4e74fd8732297fb587023c' => __DIR__ . '/..' . '/thingengineer/mysqli-database-class/MysqliDb.php',
        'd383f1ec7b1e54a09cb53eb6fcf751e0' => __DIR__ . '/..' . '/thingengineer/mysqli-database-class/dbObject.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit841622f28ef8fc7fb006338c95a58c43::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit841622f28ef8fc7fb006338c95a58c43::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
