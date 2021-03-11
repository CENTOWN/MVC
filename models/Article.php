<?php

namespace models;

use components,
    PDO;

/**
 * Работа со страницей категории статей и страницами статей
 */
class Article
{

    /**
     * Получение списка статей
     * @return array
     */
    public static function getList()
    {
        $db = components\DataBase::getConnection();
        $stmt = $db->prepare('SELECT `uri`, `title`, `content` FROM `tp_articles`');
        $stmt->execute();
        $articleList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $articleList;
    }

    /**
     * Получение запрашиваемой статьи
     * @param type $params array
     * @return array
     */
    public static function getItem($params)
    {
        $db = components\DataBase::getConnection();
        $uri = $params['segment'];
        $stmt = $db->prepare("SELECT `uri`, `title`, `content` FROM `tp_articles` WHERE uri = :uri");
        $stmt->bindParam(':uri', $uri);
        $stmt->execute();
        $articleItem = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $articleItem;
    }
}
