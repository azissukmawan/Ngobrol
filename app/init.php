<?php
spl_autoload_register(function ($class) {
    require_once 'core/' . $class . '.php';
});

require_once 'config/config.php';

function media_url($value, $folder)
{
    $value = trim((string)$value);
    $folder = trim($folder, '/');

    if ($value === '') {
        return PATH . '/' . $folder . '/';
    }

    // Absolute URLs anywhere in the string
    if (stripos($value, 'http://') === 0 || stripos($value, 'https://') === 0) {
        return $value;
    }

    // If value already contains folder prefix, avoid duplication
    if ($folder !== '' && strpos($value, $folder . '/') === 0) {
        return PATH . '/' . $value;
    }

    return PATH . '/' . ($folder !== '' ? $folder . '/' : '') . ltrim($value, '/');
}
