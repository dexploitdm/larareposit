<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends SiteController
{
    public function __construct(){
        parent::__construct();
        $this->bar ='right';
        $this->template = env('THEME').'.index';//Имя шаблона
    }
    public function index()
    {
        return $this->renderOutput();
    }

}
