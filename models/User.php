<?php

namespace models;

use components,
    PDO;

/**
 * Работа с формами регистрации и авторизации
 */
class User
{

    /**
     * Поиск пользователя в базе данных по запросу
     * @param type $params array
     * @return array
     */
    public static function getUser($params)
    {
        $db = components\DataBase::getConnection();
        $email = $params['email'];
        $stmt = $db->prepare("SELECT `email`, `password` FROM `tp_users` WHERE `email` = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $userIterator = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($user));
        $userOut = iterator_to_array($userIterator, true);
        return $userOut;
    }

    /**
     * Добавление нового пользователя в базу данных
     * @param type $params array
     * @return boolean
     */
    public static function setUser($params)
    {
        $db = components\DataBase::getConnection();
        $email = $params['email'];
        $password = $params['password'];
        $stmt = $db->prepare("SELECT * FROM `tp_users` WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($user === [] && !empty($email) && !empty($password)) {
            $stmt = $db->prepare("INSERT INTO `tp_users` (`email`, `password`) VALUES (:email, :password)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            return true;
        } else {
            return false;
        }
    }
}
