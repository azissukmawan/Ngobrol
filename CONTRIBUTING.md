## Getting Started

- Fork this repository, then clone your fork of this repository
- Run the web server on your device like Apache which is already on XAMPP
- Setup in the folder, with the following settings
>App/config/config.php
```PHP
    <?php
define('PATH', 'http://localhost:8080/Ngobrol/public');

// change your define URL to this alternative if not using composer
// define('PATH', 'http://localhost/Ngobrol/public');


define('LOCALURL', 'C:/xampp/htdocs/Ngobrol/public');
// define LOCALURL, after the path you saved in local

// DB
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ngobroldb');
/*
    set the database host, user, password, and database name
    according to what is on your local computer
*/
```
- Go to http://localhost/yourDirectory/ in your browser 
