<?php
/** 
 * @Desc: Autoload das nossas bibliotecas e helpers para o uso na aplicação 
 */

spl_autoload_register(function ($class) {
    $dirs = [
        'libraries',
        'helpers'
    ];

    foreach ($dirs as $dir) {
        $path = __DIR__ . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $class . '.php';
        if (file_exists($path)) {
            require_once($path);
        }
    }
});