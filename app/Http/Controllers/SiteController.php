<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MenusRepository;
use Menu;

class SiteController extends Controller
{
    protected $p_rep;//Хранение логики для хранение портфолио
    protected $s_rep;//Слайдер
    protected $a_rep;//Статьи
    protected $m_rep;//Меню
    protected $template;//Основная логика Вида
    protected $vars = array();
    //protected $bar = FALSE;//Сайдбар, по умолчанию нет
    //protected $contentRightBar = FALSE;
    //protected $contentLeftBar = FALSE;

    public function __construct(MenusRepository $m_rep){
        $this->m_rep = $m_rep;
    }
    protected function renderOutput(){

        $menu = $this->getMenu();
        $navigation = view(env('THEME').'.navigation')->with('menu',$menu)->render();
        $this->vars = array_add($this->vars,'navigation', $navigation);
        return view($this->template)->with($this->vars);

    }

    protected function getMenu(){
        $menu = $this->m_rep->get();
        $mBuilder = Menu::make('MyNav', function ($m) use ($menu){
            foreach($menu as $item){
                if($item->parent == 0) {//Является  ли родительским
                    $m->add($item->title, $item->path)->id($item->id);
                }  else {
                    if($m->find($item->parent)) {
                        $m->find($item->parent)->add($item->title, $item->path)->id($item->id);
                    }
                }
            }
        });
        //dd($mBuilder);
        return $mBuilder;
    }

}
