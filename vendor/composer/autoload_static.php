<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc37cd286ce357d3dea0e8ed20535bf5d
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Alexstorm13\\Menu\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Alexstorm13\\Menu\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc37cd286ce357d3dea0e8ed20535bf5d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc37cd286ce357d3dea0e8ed20535bf5d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
