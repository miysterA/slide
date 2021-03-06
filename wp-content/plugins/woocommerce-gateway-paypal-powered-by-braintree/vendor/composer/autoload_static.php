<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd968a3ef969d8cb7fb8dfff28d337837
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Braintree\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Braintree\\' => 
        array (
            0 => __DIR__ . '/..' . '/braintree/braintree_php/lib/Braintree',
        ),
    );

    public static $prefixesPsr0 = array (
        'B' => 
        array (
            'Braintree' => 
            array (
                0 => __DIR__ . '/..' . '/braintree/braintree_php/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd968a3ef969d8cb7fb8dfff28d337837::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd968a3ef969d8cb7fb8dfff28d337837::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd968a3ef969d8cb7fb8dfff28d337837::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
