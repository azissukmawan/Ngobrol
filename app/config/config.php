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
define('DB_PORT', $env('DB_PORT', '3306'));
define('DB_USER', $env('DB_USER', 'root'));
define('DB_PASS', $env('DB_PASS', ''));
define('DB_NAME', $env('DB_NAME', 'ngobroldb'));

// Object storage (MinIO / S3-compatible)
define('MINIO_ENDPOINT', rtrim($env('MINIO_ENDPOINT', ''), '/'));
define('MINIO_BUCKET', $env('MINIO_BUCKET_NAME', ''));
define('MINIO_ACCESS_KEY', $env('MINIO_ACCESS_KEY', ''));
define('MINIO_SECRET_KEY', $env('MINIO_SECRET_KEY', ''));
define('MINIO_REGION', $env('MINIO_REGION', 'us-east-1'));
define('MINIO_USE_SSL', filter_var($env('MINIO_USE_SSL', true), FILTER_VALIDATE_BOOLEAN));
