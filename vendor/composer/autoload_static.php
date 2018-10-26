<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5c35ab18b189af9793d5806e3831d8d5
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5c35ab18b189af9793d5806e3831d8d5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5c35ab18b189af9793d5806e3831d8d5::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}