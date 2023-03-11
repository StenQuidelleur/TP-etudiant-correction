<?php

//Model (for connexion data, see unversionned db.php)
define('DB_USER', APP_DB_USER);
define('DB_PASSWORD', APP_DB_PWD);
define('DB_HOST', APP_DB_HOST);
define('DB_NAME', APP_DB_NAME);

//View
define('APP_VIEW_PATH', __DIR__ . '/../src/Views/');

// database dump file path for automatic import
define('DB_DUMP_PATH', __DIR__ . '/../database_student.sql');

// To load the DB, uncomment the line below, reload homepage and comment the line
# require_once( __DIR__ . '/../migration.php');