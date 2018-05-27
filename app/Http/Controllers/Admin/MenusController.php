<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MenusRequest;
use App\Repositories\ArticlesRepository;
use App\Repositories\MenusRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Menu;
use App\Category;

class MenusController extends AdminController
{
    public function __construct(MenusRepository $m_rep, ArticlesRepository $a_rep) {
        parent::__construct();

        $this->m_rep = $m_rep;
        $this->a_rep = $a_rep;
        $this->template = env('THEME').'.admin.menus';

    }

    public function index()
    {
        $this->title = 'Управление ссылками';
        $menu = $this->getMenus();
        $this->content = view(env('THEME').'.admin.menus_content')->with('menus', $menu)->render();

        return $this->renderOutput();
    }

    public function getMenus() {
        $menu = $this->m_rep->get();
        if($menu->isEmpty()) {
            return FALSE;
        }
        return Menu::make('forMenuPart', function($m) use($menu) {
            foreach($menu as $item) {
                if($item->parent == 0) {
                    $m->add($item->title, $item->path)->id($item->id);
                }
                else {
                    if($m->find($item->parent)) {
                        $m->find($item->parent)->add($item->title, $item->path)->id($item->id);
                    }
                }
            }
        });
    }

    public function create()
    {
        $this->title = 'Новый пунк навигации';
        $tmp = $this->getMenus()->roots();
        $menus = $tmp->reduce(function($returnMenus, $menu) {
            $returnMenus[$menu->id] = $menu->title;
            return $returnMenus;
        },['0' => 'Родительский пункт навигации']);
        $categories = Category::select('*')->get();
        $list = array();
        $list = array_add($list,'0','Не используется');
        $list = array_add($list,'parent','Раздел статьи');

        foreach ($categories as $category) {
            if($category->parent_id == 0) {
                $list[$category->title] = array();
            }
            else {
                $list[$categories->where('id',$category->parent_id)->first()->title][$category->alias] = $category->title;
            }
        }

        $articles = $this->a_rep->get(['id','alias','title'])->reduce(function ($returnArticles, $article) {
            $returnArticles[$article->alias] = $article->title;
            return $returnArticles;
        }, []);

        $this->content = view(env('THEME').'.admin.menus_create_content')->with(['menus'=>$menus,'categories'=>$list,'articles' => $articles])->render();

        return $this->renderOutput();
    }

    public function store(MenusRequest $request)
    {
        $result = $this->m_rep->addMenu($request);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect('/admin/menus')->with($result);
    }

    public function edit(\App\Menu $menu)
    {
        $this->title = 'Редактирование навигации - '.$menu->title;
        $type = FALSE; //Какой тип меню редактируем
        $option = FALSE; //Активность радио кнопки
        $route = (app('router')->getRoutes()->match(app('request')->create($menu->path)));
        $aliasRoute = $route->getName();
        $parameters = $route->parameters();// Параметры маршрута
        if($aliasRoute == 'articles.index' || $aliasRoute == 'articleCat') {
            $type = 'articleLink';
            $option = isset($parameters['cat_alias']) ? $parameters['cat_alias'] : 'parent';
        }
        else if($aliasRoute == 'articles.show') {
            $type = 'articleLink';
            $option = isset($parameters['alias']) ? $parameters['alias'] : '';
        }

        else {
            $type = 'customLink';
        }

        $tmp = $this->getMenus()->roots();
        $menus = $tmp->reduce(function($returnMenus, $menu) {
            $returnMenus[$menu->id] = $menu->title;
            return $returnMenus;
        },['0' => 'Родительский пункт навигации']);
        $categories = Category::select(['title','alias','parent_id','id'])->get();
        $list = array();
        $list = array_add($list,'0','Не используется');
        $list = array_add($list,'parent','Раздел блог');
        foreach ($categories as $category) {
            if($category->parent_id == 0) {
                $list[$category->title] = array();
            }
            else {
                $list[$categories->where('id',$category->parent_id)->first()->title][$category->alias] = $category->title;
            }
        }

        $articles = $this->a_rep->get(['id','alias','title'])->reduce(function ($returnArticles, $article) {
            $returnArticles[$article->alias] = $article->title;
            return $returnArticles;
        }, []);

        $this->content = view(env('THEME').'.admin.menus_create_content')->with([
            'menus'=>$menus,
            'menu'=>$menu,
            'type'=>$type,
            'option'=>$option,
            'categories'=>$list,
            'articles' => $articles
        ])->render();
        return $this->renderOutput();
    }



    public function update(Request $request, \App\Menu $menu)
    {
        $result = $this->m_rep->updateMenu($request, $menu);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect('/admin/menus')->with($result);
    }

    public function destroy(\App\Menu $menu)
    {
        $result = $this->m_rep->deleteMenu($menu);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect('/admin/menus')->with($result);
    }

}