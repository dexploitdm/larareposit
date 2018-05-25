<?php

namespace App\Http\Controllers;

use App\Repositories\SlidersRepository;
use Illuminate\Http\Request;

class IndexController extends SiteController
{
    public function __construct(SlidersRepository $s_rep){
        parent::__construct(new \App\Repositories\MenusRepository(new \App\Menu));
        $this->s_rep = $s_rep;
        $this->template = env('THEME').'.index';//Имя шаблона
    }
    public function index()
    {
        $this->keywords = '';
        $this->meta_desc = '';
        $this->title = 'larareposit';

        $sliders = $this->getSliders();
        $slider = view(env('THEME').'.slider')->with('slider',$sliders)->render();
        $this->vars = array_add($this->vars,'slider', $slider);

        return $this->renderOutput();
    }

    public function getSliders() {
        $slider = $this->s_rep->get('*');
        return $slider;
    }

}
