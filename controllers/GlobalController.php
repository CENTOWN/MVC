<?php

namespace controllers;

use models,
    components;

/**
 * Вызов actions
 */
class GlobalController
{

    /**
     * Вызов главной страницы
     */
    public function actionIndex()
    {
        components\View::render($this->files('index'), []);
    }

    /**
     * Вызов страницы категории статей
     * @param type $params array
     */
    public function actionArticleList($params)
    {
        $articleList = models\Article::getList();
        components\View::render($this->files('articles'), $articleList);
    }

    /**
     * Вызов страницы статьи
     * @param type $params array
     */
    public function actionArticleItem($params)
    {
        $articleItem = models\Article::getItem($params);
        components\View::render($this->files('article'), $articleItem);
    }

    /**
     * Вызов страницы личного кабинета
     * @param type $params array
     */
    public function actionCabinet($params)
    {
        components\View::render($this->files('cabinet'), []);
    }

    /**
     * Вызов страницы ошибки
     */
    public function action404()
    {
        components\View::render($this->files('404'), []);
    }

    /**
     * Свзывание шапки сайта, контента и подвала сайта
     * @param type $file string
     * @return array
     */
    private function files($file)
    {
        return ['header', $file, 'footer'];
    }
}
