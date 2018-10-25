<?php

/* An autoloader for BwtTest\Foo classes. This should be required()
 * by the user before attempting to instantiate any of the ReCaptcha
 * classes.
 */

spl_autoload_register(function ($class) {
    if (substr($class, 0, 8) !== 'BwtTest\\') {
        /* If the class does not lie under the "BwtTest" namespace,
         * then we can exit immediately.
         */
        return;
    }

    /* All of the classes have names like "BwtTest\Foo", so we need
     * to replace the backslashes with frontslashes if we want the
     * name to map directly to a location in the filesystem.
     */
    $class = str_replace('\\', '/', $class);

    /* First, check under the current directory. It is important that
     * we look here first, so that we don't waste time searching for
     * test classes in the common case.
     */
    $path = dirname(__FILE__).'/'.$class.'.php';
    if (is_readable($path)) {
        require_once $path;

        return;
    }
});

BwtTest\Route::start(); // starting router
