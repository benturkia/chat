<?php
/**
 * Created by IntelliJ IDEA.
 * User: benturkia
 * Date: 30/11/2016
 * Time: 13:51
 */

// Global Config Application

/**
 * URL_PUBLIC_FOLDER
 */
define('URL_PUBLIC_FOLDER', 'web');

/**
 * URL_PROTOCOL
 */
define('URL_PROTOCOL', '//');

/**
 * URL_DOMAIN
 */
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);

/**
 * URL_SUB_FOLDER
 */
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));

/**
 * define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);
 */
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);



/**
 * parameters database
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'chat');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8');