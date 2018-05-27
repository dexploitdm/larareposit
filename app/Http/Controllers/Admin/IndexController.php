<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\ArticlesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends AdminController
{
    public function __construct(ArticlesRepository $a_rep) {
        parent::__construct();

        $this->a_rep = $a_rep;
        $this->template = env('THEME').'.admin.index';
    }
    public function index() {

        $this->title = 'Панель администратора';

        $articles = $this->getArticles();

        $this->content =view(env('THEME').'.admin.index_content')
            ->with(['articles'=> $articles])->render();

        return $this->renderOutput();

    }

    public function getArticles() {
        $articles = $this->a_rep->get();
        return $articles;
    }
}
