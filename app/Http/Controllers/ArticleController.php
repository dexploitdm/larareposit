<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Http\Requests;
use App\Repositories\ArticlesRepository;

class ArticleController extends SiteController
{
    public function __construct(ArticlesRepository $a_rep)
    {

        parent::__construct(new \App\Repositories\MenusRepository(new \App\Menu));

        $this->a_rep = $a_rep;
        $this->template = env('THEME') . '.articles';
    }

    public function index($cat_alias = FALSE)
    {
        $this->title = 'Статьи';
        $this->keywords = 'Статьи про web разработку, сайт, портфолио, уроки, инструкции, web дизайн, frontend, backend';
        $this->meta_desc = 'Статьи';

        $article = $this->getArticle($cat_alias);
        $content = view(env('THEME') . '.articles_content')->with('article', $article)->render();
        $this->vars = array_add($this->vars, 'content', $content);

        return $this->renderOutput();
    }


    public function getArticle($alias = FALSE) {

        $where = FALSE;

        if($alias) {
            $id = Category::select('id')->where('alias', $alias)->first()->id;
            $where = ['category_id', $id];
        }
        $article = $this->a_rep->get_blogs(['id','title','alias','created_at','img','desc', 'category_id'], FALSE, TRUE, $where);

        if($article) {
            $article->load('category');
        }
        return $article;
    }

    public function show($alias = FALSE) {

        $article = $this->a_rep->one($alias);

        $this->title = $article->title;
        $this->keywords = $article->keywords;
        $this->meta_desc = $article->desc;

        if($article) {
            $article->img = json_decode($article->img);
        }
        $content = view(env('THEME').'.article_content')->with('article', $article)->render();
        $this->vars = array_add($this->vars, 'content', $content);

        return $this->renderOutput();
    }
}
