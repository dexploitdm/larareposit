<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends SiteController
{
    public function __construct(){
        parent::__construct(new \App\Repositories\MenusRepository(new \App\Menu));
        $this->template = env('THEME').'.index';//Имя шаблона
    }
    public function index()
    {
        $this->keywords = 'Создание сайтов под заказ, Портфолио web разработчика, недорого, создание сайтов недорого, разработка web приложений, в Перми, заказать сайт, разработка плагинов, Сайт на Laravel';
        $this->meta_desc = 'Портфолио web разработчика. Качественная разработка сайтов с адаптивным дизайном. Разработка сайтов на Laravel, Yii2, Wordpress';
        $this->title = 'Dexploitdm';

        return $this->renderOutput();
    }

}
