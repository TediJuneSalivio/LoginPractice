<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'dino_database');
$db = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
