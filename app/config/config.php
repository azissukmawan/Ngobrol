<?php
$env = function ($key, $default = null) {
	$value = getenv($key);
	return $value !== false ? $value : $default;
};

// App
define('PATH', $env('APP_URL', 'http://localhost/Ngobrol/public'));
define('LOCALURL', $env('APP_LOCAL_PATH', 'C:/xampp/htdocs/Ngobrol/public'));

// DB
define('DB_HOST', $env('DB_HOST', 'localhost'));
define('DB_USER', $env('DB_USER', 'root'));
define('DB_PASS', $env('DB_PASS', ''));
define('DB_NAME', $env('DB_NAME', 'ngobroldb'));
