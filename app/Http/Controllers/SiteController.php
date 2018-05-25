<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    protected $p_rep;//Хранение логики для хранение портфолио
    protected $s_rep;//Слайдер
    protected $a_rep;//Статьи
    protected $m_rep;//Меню
    protected $temlate;//Основная логика Вида
    protected $vars = array();
    //protected $bar = FALSE;//Сайдбар, по умолчанию нет
    //protected $contentRightBar = FALSE;
    //protected $contentLeftBar = FALSE;

    public function __construct(){
    }
    protected function renderOutput(){

        return view($this->template)->with($this->vars);
    }

}
