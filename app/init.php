<?php
spl_autoload_register(function ($class) {
    require_once 'core/' . $class . '.php';
});

require_once 'config/config.php';

if (!function_exists('media_url')) {
    function media_url($value, $folder)
    {
        $value = trim((string)$value);
        $folder = trim($folder, '/');

        if ($value === '') {
            return PATH . '/' . $folder . '/';
        }

        // Absolute URLs
        if (preg_match('/^https?:\/\//i', $value)) {
            return $value;
        }

        // If value already starts with folder, don't duplicate folder
        if ($folder !== '' && strpos($value, $folder . '/') === 0) {
            return PATH . '/' . $value;
        }

        return PATH . '/' . ($folder !== '' ? $folder . '/' : '') . ltrim($value, '/');
    }
}
