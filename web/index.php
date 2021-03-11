<?php

/**
 * Отображение ошибок на время разработки...
 */
ini_set('display_errors', E_ALL);

/**
 * Подключение файлов
 */
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('DIR_VIEW', ROOT . '/view/');
spl_autoload_register('autoload');

function autoload($name)
{
    require_once ROOT . '/' . strtolower($name) . '.php';
}

/**
 * Вызов маршрутизатора
 */
$router = new components\RoutingRules();
$router->run();
