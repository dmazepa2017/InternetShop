<?php
/**
 * Created by PhpStorm.
 * User: Mazok
 * Date: 18.08.2017
 * Time: 14:59
 */

class NewsController
{
    public function actionIndex ()
    {
        echo 'Список новостей';
        return true;
    }

    public function actionView ()
    {
        echo 'Просмотр одной новости';
        return true;
    }
}