<?php

define('ENV_DEVELOPMENT', 'development');
define('ENV_STAGING', 'staging');
define('ENV_ACCEPT', 'accept');
define('ENV_PRODUCTION', 'production');

if (!defined('APPLICATION_ENV')) {
    if (getenv('ENVIRONMENT') !== false) {
        define('APPLICATION_ENV', getenv('ENVIRONMENT'));
    }
    else {
        if (php_sapi_name() == 'cli') {
            if (strpos(__DIR__, '/Users/') !== false) {
                $environment = ENV_DEVELOPMENT;
            }
            else {
                $environment = ENV_PRODUCTION;
            }
        }
        elseif (!empty($_SERVER['SERVER_NAME'])) {
            switch ($_SERVER['SERVER_NAME']) {
                case 'localhost':
                    $environment = ENV_DEVELOPMENT;
                break;
                case 'staging.dualdev.com':
                    $environment = ENV_STAGING;
                break;
                default:
                    $environment = ENV_PRODUCTION;
                break;
            }
        }
        else {
            $environment = ENV_PRODUCTION;
        }
        define('APPLICATION_ENV', $environment);
    }
}

if (APPLICATION_ENV != ENV_PRODUCTION && isset($_REQUEST['ENVIRONMENT'])) {
    exit("<pre>ENVIRONMENT: " . APPLICATION_ENV . "\nSERVER_NAME: " . $_SERVER['SERVER_NAME'] . "\n</pre>");
}

if (!defined('PATH_ROOT')) {
    define('PATH_ROOT', realpath(__DIR__ . '/../') . DIRECTORY_SEPARATOR);
}
if (!defined('APPLICATION_GATEWAY_URL')) {
    define('APPLICATION_GATEWAY_URL', 'js.php');
}
if (!defined('HTTP_ROOT')) {
    $scheme   = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80) ? 'https://' : 'http://';
    $httpRoot = $scheme . @$_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
    if (substr($httpRoot, -1, 1) != '/') {
        $httpRoot .= '/';
    }
    define('HTTP_ROOT', $httpRoot);
}
