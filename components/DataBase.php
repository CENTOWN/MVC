<?php

namespace components;

use PDO;
use PDOException;

class DataBase
{

    /**
     * Подключение к БД
     * @return object
     */
    public static function getConnection()
    {
        $params = require_once(ROOT . '/config/params.php');
        $dsn = 'mysql:host=' . $params['host'] . ';' . 'dbname=' . $params['dbname'];
        try {
            $db = new PDO($dsn, $params['user'], $params['password']);
            return $db;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
