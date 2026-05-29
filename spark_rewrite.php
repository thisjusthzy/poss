<?php

declare(strict_types=1);

// Custom routing for PHP built-in server
$requestPath = urldecode(
    parse_url('http://localhost' . $_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: ''
);

$_SERVER['SCRIPT_NAME'] = '/index.php';

$targetFile = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . ltrim($requestPath, '/');

if ($requestPath !== '/' && file_exists($targetFile)) {
    return false;
}

unset($requestPath, $targetFile);

require $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'index.php';
