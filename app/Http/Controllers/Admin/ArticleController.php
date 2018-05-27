<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use App\Repositories\ArticlesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends AdminController
{
    public function __construct(ArticlesRepository $a_rep) {
        parent::__construct();

        $this->a_rep = $a_rep;
        $this->template = env('THEME').'.admin.articles';
    }

    public function index() {
        $this->title = 'Мои записи';
        $article = $this->getArticles();
        $this->content =view(env('THEME').'.admin.articles_content')
            ->with('article', $article)->render();

        return $this->renderOutput();
    }

    public function getArticles() {
        $article =$this->a_rep->get('*',FALSE,TRUE,FALSE);
        return $article;
    }

    public function create()
    {

        $this->title = 'Добавить новый материал';
        $categories = Category::select(['title','alias','parent_id','id'])->get();

        $lists =array();
        foreach($categories as $category) {
            if($category->parent_id == 0) {
                $lists[$category->title] = array();
            }
            else {
                $lists[$categories->where('id',$category->parent_id)->first()->title]
                [$category->id] = $category->title;
            }
        }
        $this->content = view(env('THEME').'.admin.articles_create_content')->with('categories', $lists)->render();

        return $this->renderOutput();
    }

    public function edit(Article $article)
    {
        $article->img =json_decode($article->img);
        $categories = Category::select(['title','alias','parent_id','id'])->get();
        $lists = array();
        foreach($categories as $category) {
            if($category->parent_id == 0) {
                $lists[$category->title] = array();
            }
            else {
                $lists[$categories->where('id',$category->parent_id)->first()->title][$category->id] = $category->title;
            }
        }
        $this->title = 'Редактирование материала - '. $article->title;
        $this->content = view(env('THEME').'.admin.articles_create_content')
            ->with(['categories' => $lists,'article'=>$article])->render();


        return $this->renderOutput();
    }

    public function store(ArticleRequest $request)
    {
        $result = $this->a_rep->addArticle($request);
        if(is_array($result) && !empty(['error'])) {
            return  back()->with($result);
        }
        return redirect('/admin')->with($result);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $result = $this->a_rep->updateArticle($request, $article);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect('/admin/article')->with($result);
    }

    public function destroy(Article $article)
    {
        $result = $this->a_rep->deleteArticle($article);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect('/admin/article')->with($result);
    }
}
