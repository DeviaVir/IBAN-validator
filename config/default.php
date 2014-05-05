<?php

$loader = require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/environment.php';

date_default_timezone_set('UTC');

$config = array(
    'env' => APPLICATION_ENV,
    'debug' => false,
    'php' => array(
        'timezone' => 'UTC',
        'errorReporting' => 0,
        'ini' => array(
            'display_errors' => false,
            'display_startup_errors' => false
        )
    ),
    'httpcache.options' => array(
        'http_cache.cache_dir' => PATH_ROOT . 'data/cache/http/'
    ),
    'path' => array(
        'cache' => array(
            'base' => PATH_ROOT . 'data/cache/'
        ),
        'data' => array(
            'private' => PATH_ROOT . 'data/',
            'public' => PATH_ROOT . 'public_html/data/'
        )
    ),
    'url' => array(
        'base' => HTTP_ROOT
    ),
    'log.options' => array(
        'file' => PATH_ROOT . 'data/log/' . date('Y-m-d') . '.log'
    )
);

// apply local config
if (!function_exists('array_merge_recursive_distinct')) {
    function array_merge_recursive_distinct(array &$array1, array &$array2)
    {
        $merged = $array1;
        foreach ($array2 as $key => &$value) {
            if (is_array($value) && isset ($merged [$key]) && is_array($merged [$key])) {
                $merged [$key] = array_merge_recursive_distinct($merged [$key], $value);
            } else {
                $merged [$key] = $value;
            }
        }
        return $merged;
    }
}

if (file_exists(__DIR__ . DIRECTORY_SEPARATOR . APPLICATION_ENV . '.php')) {
    require_once __DIR__ . DIRECTORY_SEPARATOR . APPLICATION_ENV . '.php';
    $config = array_merge_recursive_distinct($config, $environmentConfig);
}

// php values and settings
date_default_timezone_set($config['php']['timezone']);
error_reporting($config['php']['errorReporting']);

if (!empty($config['php']['ini'])) {
    foreach ($config['php']['ini'] as $k => $v) {
        ini_set($k, $v);
    }
}