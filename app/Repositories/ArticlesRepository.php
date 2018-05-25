<?php
/**
 * Created by PhpStorm.
 * User: Dexploitdm
 * Date: 25.05.2018
 * Time: 21:37
 */

namespace App\Repositories;
use App\Article;
use Image;
use Config;

class ArticlesRepository extends Repository {

    public function __construct(Article $article){
        $this->model = $article;
    }

    public function one($alias, $attr = array()) {
        $article = parent::one($alias, $attr);
        if($article && !empty($attr)) {

        }
        return $article;
    }

    public function addArticle($request) {

        $data = $request->except('_token','image');
        if(empty($data)) {
            return array('error' => 'Нет данных');
        }

        if(empty($data['alias'])) {
            $data['alias'] = $this->transliterate($data['title']);
        }
        if($this->one($data['alias'], FALSE)) {
            $request->merge(array('alias' => $data['alias']));
            $request->flash();
            return ['error' => 'Данный псевдоним уже используется'];
        }

        if($request->hasFile('image')) {
            $image = $request->file('image');
            if($image->isValid()) {
                $str = str_random(8);
                $obj = new \stdClass;
                $obj->path = $str.'.png';
                $img = Image::make($image);
                $img->save(public_path().'/'.env('THEME').'/img/article/'.$obj->path);
                $data['img'] = json_encode($obj);
            }
            if($this->model->fill($data)->save()) {
                return ['status' => 'Запись добавлена'];
            }
        }
    }

    public function updateArticle($request, $article) {

        $data = $request->except('_token','image','_method');
        if(empty($data)) {
            return array('error' => 'Нет данных');
        }

        if(empty($data['alias'])) {
            $data['alias'] = $this->transliterate($data['title']);
        }
        $result = $this->one($data['alias'], FALSE);
        if(isset($result->id) && ($result->id != $article->id)) {
            $request->merge(array('alias' => $data['alias']));
            $request->flash();
            return ['error' => 'Данный псевдоним уже используется'];
        }
        if($request->hasFile('image')) {
            $image = $request->file('image');
            if($image->isValid()) {
                $str = str_random(8);
                $obj = new \stdClass;
                $obj->path = $str.'.png';
                $img = Image::make($image);
                $img->save(public_path().'/'.env('THEME').'/img/article/'.$obj->path);
                $data['img'] = json_encode($obj);
            }
        }
        $article->fill($data);
        if($article->update()) {
            return ['status'=> 'Материал обновлен'];
        }
    }

    public function deleteArticle($article) {

        $article->delete();
        if($article->delete()) {
            return ['status' => 'Материал удален'];
        }
    }
}