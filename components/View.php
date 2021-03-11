<?php

namespace components;

/**
 * Вызов запрошенной страницы
 */
class View
{

    /**
     * Вызов запрошенной страницы
     * @param type $files array
     * @param type $data array
     */
    public static function render($files, $data)
    {
        foreach ($files as $file) {
            require_once(DIR_VIEW . $file . '.tpl');
        }
    }
}
