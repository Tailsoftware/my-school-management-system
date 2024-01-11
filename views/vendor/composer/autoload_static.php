<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6b2fc6013b7432e65ad2a976b523a592
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6b2fc6013b7432e65ad2a976b523a592::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6b2fc6013b7432e65ad2a976b523a592::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6b2fc6013b7432e65ad2a976b523a592::$classMap;

        }, null, ClassLoader::class);
    }
}