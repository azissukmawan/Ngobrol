<?php
spl_autoload_register(function ($class) {
    require_once 'core/' . $class . '.php';
});

require_once 'config/config.php';

if (!function_exists('media_url')) {
    function media_url($value, $folder)
    {
        if (!$value) {
            return PATH . '/' . $folder . '/';
        }
        $isAbsolute = preg_match('/^https?:\/\//i', $value) === 1;
        return $isAbsolute ? $value : PATH . '/' . trim($folder, '/') . '/' . ltrim($value, '/');
    }
}
