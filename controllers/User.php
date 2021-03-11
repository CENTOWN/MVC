<?php

namespace controllers;

use models;

/**
 * Работа с формами регистрации и авторизации
 */
class User
{

    /**
     * Авторизация пользователя
     * @param type $params array
     */
    public function login($params)
    {
        $user = models\User::getUser($params);
        if ($params['email'] === $user['email'] && password_verify($params['password'], $user['password'])) {
            session_start();
            foreach ($user as $key => $value) {
                $_SESSION[$key] = $value;
            }
            $_SESSION['authorization'] = true;
            echo 'true';
        }
    }

    /**
     * Деавторизация пользователя
     */
    public function logout()
    {
        session_start();
        session_destroy();
    }

    /**
     * Регистрация пользователя
     * @param type $params array
     */
    public function registration($params)
    {
        $params['password'] = password_hash($params['password'], PASSWORD_DEFAULT);
        $user = models\User::setUser($params);
        if ($user === true) {
            echo 'true';
        }
    }
}
