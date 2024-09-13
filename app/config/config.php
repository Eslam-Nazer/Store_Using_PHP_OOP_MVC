<?php


//defined(DS) ? null: define('DS', DIRECTORY_SEPARATOR);
define("APP_PATH", realpath(dirname(__FILE__)) . DS . '..');
define('VIEWS_PATH', APP_PATH . DS . 'views' . DS);
define("TEMPLATE_PATH", APP_PATH . DS . 'template' . DS);
define("LANGUAGE_PATH", APP_PATH . DS . 'languages' . DS);

define("CSS", '/css/');
define("JS", '/js/');

defined('DATABASE_HOST_NAME')   ? NULL : define('DATABASE_HOST_NAME', 'localhost');
defined('DATABASE_USER_NAME')   ? NULL : define('DATABASE_USER_NAME', 'root');
defined('DATABASE_PASSWORD')    ? NULL : define('DATABASE_PASSWORD', '');
defined('DATABASE_DB_NAME')     ? NULL : define('DATABASE_DB_NAME', 'storedb');
defined('DATABASE_CONN_DRIVER') ? NULL : define('DATABASE_CONN_DRIVER', 1);

defined('APP_DEFAULT_LANGUAGE') ? NULL : define('APP_DEFAULT_LANGUAGE', 'en');

// Session configuration
defined("SESSION_NAME")         ? NULL : define('SESSION_NAME', '_ESTORE_SESSION');
defined("SESSION_LIFE_TIME")    ? NULL : define('SESSION_LIFE_TIME', 0);
defined("SESSION_SAVE_PATH")    ? NULL : define('SESSION_SAVE_PATH', APP_PATH . DS . '..' . DS . 'sessions');

// SALT
defined('APP_SALT')             ? NULL : define('APP_SALT', '$2y$07$O9EYif5O2DmWuHQ8S5iYsi$');

// Check for access privileges
defined("CHECK_FOR_PRIVILEGES") ? NULL : define('CHECK_FOR_PRIVILEGES', 1);

// define the path to our uploaded files
defined('UPLOAD_STORAGE')               ? NULL : define('UPLOAD_STORAGE', APP_PATH . DS . '..' . DS . 'public' . DS . 'uploads');
defined('IMAGES_UPLOAD_STORAGE')        ? NULL : define('IMAGES_UPLOAD_STORAGE', UPLOAD_STORAGE . DS . 'images');
defined('DOCUMENTS_UPLOAD_STORAGE')     ? NULL : define('DOCUMENTS_UPLOAD_STORAGE', UPLOAD_STORAGE . DS . 'documents');

// Max Accepted file size
defined('MAX_FILE_SIZE_ALLOWED')        ? NULL : define('MAX_FILE_SIZE_ALLOWED', ini_get('upload_max_filesize'));
