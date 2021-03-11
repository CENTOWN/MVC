<?php

/**
 * Таблица маршрутов
 */
return [
    'articles' => 'article/list',
    'articles((/([a-z-]+))+)' => 'article/item' . '$1',
    'cabinet' => 'cabinet',
];
