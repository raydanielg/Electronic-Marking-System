<?php

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

$publicPath = __DIR__.DIRECTORY_SEPARATOR.'public';

if ($uri !== '/' && $uri !== '') {
    $requested = $publicPath.$uri;

    if (file_exists($requested) && !is_dir($requested)) {
        return false;
    }
}

require_once $publicPath.DIRECTORY_SEPARATOR.'index.php';
