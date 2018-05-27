<?php
namespace App\Repositories;

use App\Menu;


class MenusRepository extends Repository {

    public function __construct(Menu $menu){
        $this->model = $menu;
    }

    public function addMenu($request) {

        $data = $request->only('type','title','parent');
        if(empty($data)) {
            return ['error' => 'Нет данных'];
        }

        switch($data['type']) {
            case 'customLink':
                $data['path'] = $request->input('custom_link');
                break;
            case 'articleLink':
                if($request->input('category_alias')) {
                    if($request->input('category_alias') == 'parent') {
                        $data['path'] = route('article.index');
                    }
                    else {
                        $data['path'] = route('articleCat',['cat_alias' => $request->input('category_alias')]);
                    }
                }
                else if($request->input('article_alias')) {
                    $data['path'] = route('article.show',['alias' =>$request->input('article_alias')]);
                }
                break;
        }

        unset($data['type']);

        if($this->model->fill($data)->save()) {
            return ['status' => 'Ссылка добавлена'];
        }
    }

    public function updateMenu($request, $menu) {

        $data = $request->only('type','title','parent');
        if(empty($data)) {
            return ['error' => 'Нет данных'];
        }

        switch($data['type']) {
            case 'customLink':
                $data['path'] = $request->input('custom_link');
                break;
            case 'articleLink':
                if($request->input('category_alias')) {
                    if($request->input('category_alias') == 'parent') {
                        $data['path'] = route('article.index');
                    }
                    else {
                        $data['path'] = route('articleCat',['cat_alias' => $request->input('category_alias')]);
                    }
                }
                else if($request->input('article_alias')) {
                    $data['path'] = route('article.show',['alias' =>$request->input('article_alias')]);
                }
                break;
        }
        unset($data['type']);

        if($menu->fill($data)->update()) {
            return ['status' => 'Ссылка обновлена'];
        }
    }

    public function deleteMenu($menu) {

        if($menu->delete()) {
            return ['status'=>'Ссылка удалена'];
        }

    }

}
