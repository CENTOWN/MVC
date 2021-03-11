<?php

namespace components;

use controllers;

class RoutingRules
{

    private $routes;

    public function __construct()
    {
        $this->routes = include(ROOT . '/config/routes.php');
    }

    /**
     * Получение и разбир URI текущей страницы
     * @return array
     */
    private function getURI()
    {
        $trimUri = trim(filter_input(INPUT_SERVER, 'REQUEST_URI'), '/');
        $uri = parse_url($trimUri, PHP_URL_PATH);
        $params['uri'] = $uri;
        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match('~^' . $uriPattern . '$~', $uri)) {
                $internalRoute = preg_replace('~^' . $uriPattern . '$~', $path, $uri);
                $segments = explode('/', $internalRoute);
                $actionName = 'action' . ucfirst(array_shift($segments)) . ucfirst(array_shift($segments));
                $params += [
                    'action' => $actionName,
                    'segment' => implode('/', $segments),
                ];
                break;
            }
        }
        return $params;
    }

    /**
     * Вызов action в зависимости от типа запроса или URI
     */
    public function run()
    {
        if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') !== 'POST') {
            $paramsUri = $this->getURI();
            $uri = $paramsUri['uri'];
            $action = $paramsUri['action'];
            $router = new controllers\GlobalController();
            if (empty($uri)) {
                $router->actionIndex();
            } elseif (method_exists($router, $action)) {
                $router->$action($paramsUri);
            } else {
                $router->action404();
            }
        } else {
            $params = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $user = new controllers\User($params);
            isset($params['authorization']) ? $user->login($params) : $user->logout();
            isset($params['registration']) ? $user->registration($params) : false;
        }
    }
}
