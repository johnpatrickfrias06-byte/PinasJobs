<?php
// Simple PSR-4 autoloader for this app so it does not depend on Composer/vendor.
// It maps the Framework\ namespace to Framework/ and App\ namespace to App/.

spl_autoload_register(function (string $class) {
    $prefixes = [
        'Framework\\' => __DIR__ . '/Framework/',
        'App\\' => __DIR__ . '/App/',
    ];

    foreach ($prefixes as $prefix => $baseDir) {
        if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
            continue;
        }

        $relativeClass = substr($class, strlen($prefix));
        $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

        if (file_exists($file)) {
            require $file;
        }
    }
});
