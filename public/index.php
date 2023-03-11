<?php

require_once __DIR__ . '/../vendor/autoload.php';

define('BASE_VIEW_PATH', dirname(__DIR__). DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);
define('START_LAYOUT', include(BASE_VIEW_PATH.'layout/layout_start.php'));
define('END_LAYOUT', include(BASE_VIEW_PATH.'layout/layout_end.php'));

if (file_exists(__DIR__ . '/../config/db.php')) {
    require_once __DIR__ . '/../config/db.php';
}
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../src/routing.php';