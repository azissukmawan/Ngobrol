# NGOBROL

This is a project at the end of semester 4 of the assignment collage for the web application course (Group).

![Ngobrol](https://cdn.jsdelivr.net/gh/azissukmawan/Project-Mata-kuliah-Aplikasi-Web@main/public/img/logo/logo.png) 

![GitHub last commit](https://img.shields.io/github/last-commit/azissukmawan/Project-Mata-kuliah-Aplikasi-Web)

# Description

This web application is made with the MVC pattern that uses the native PHP language,
the MVC pattern that is being studied in a web application course, therefore my final semester assignment group and I worked on a web application case study with this MVC pattern with a simple social media theme inspired by tweeters but not completely tweeter-like XD.

## Features

- Register and login
- View profiles and view other profiles
- Update profiles
- Post uploads
- Post updates
- Delete posts
- Like posts
- Post comments

## What the app currently looks like



https://user-images.githubusercontent.com/89589561/215840847-763e21f9-f41e-4450-b852-a209735df4e8.mp4





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


## Tech

NGOBROL uses a number of open source projects to work properly:

- [PHP](https://www.php.net)
- [Java Script](https://www.javascript.com)
- HTML
- [Bootstrap](https://getbootstrap.com)
- [XAMPP](https://www.apachefriends.org/download.html)
- CSS
- [jQuery](https://jquery.com)
