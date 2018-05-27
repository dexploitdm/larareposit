<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Menu;

class AdminController extends \App\Http\Controllers\Controller
{
    protected $p_rep;//Хранение логики для хранение портфолио
    protected $s_rep;//Слайдер
    protected $a_rep;//Статьи
    protected $m_rep;//Меню

    protected $template;//Основная логика Вида
    protected $content = FALSE;
    protected $title;
    protected $vars = array();
    //protected $bar = FALSE;//Сайдбар, по умолчанию нет
    //protected $contentRightBar = FALSE;
    //protected $contentLeftBar = FALSE;

    public function __construct() {
        $this->user = Auth::user();

    }
    public function renderOutput(){
        $this->vars = array_add($this->vars,'title', $this->title);

        $menu = $this->getMenu();
        $navs = $this->getNav();
        $articles = $this->getArticles();

        $navigation = view(env('THEME').'.admin.navigation')->with([
            'menu' => $menu,
            'navs' => $navs,
            'articles' => $articles
        ])->render();
        $this->vars =array_add($this->vars,'navigation', $navigation);
        if($this->content) {
            $this->vars = array_add($this->vars,'content', $this->content);
        }
        return view($this->template)->with($this->vars);

    }
    public function getNav() {
        $navs = \App\Menu::all();
        return $navs;
    }
    public function getArticles() {
        $articles = Article::all();
        return $articles;
    }

    public function getMenu() {
        return Menu::make('adminMenu', function($menu) {
            //$menu->add('Статьи', array('route'=> 'admin.blogs.index'));
        });
    }

}
