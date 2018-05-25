<?php
namespace App\Repositories;

use App\Slider;
use Image;


class SlidersRepository extends Repository {

    public function __construct(Slider $slider){
        $this->model = $slider;
    }

    public function addSlider($request) {

        $data = $request->except('_token','image');
        if(empty($data)) {
            return array('error' => 'Нет данных');
        }

        if(empty($data['alias'])) {
            $data['alias'] = $this->transliterate($data['title']);
        }
        if($this->one($data['alias'], FALSE)) {
            $request->merge(array('alias' => $data['alias']));
            //Сохранним в сессию
            $request->flash();
            return ['error' => 'Данный псевдоним уже используется'];
        }
        // Изображение
        if($request->hasFile('image')) {
            $image = $request->file('image');
            if($image->isValid()) {
                $str = str_random(8);
                $obj = new \stdClass;
                $obj->path = $str.'.png';
                $img = Image::make($image);
                $img->save(public_path().'/'.env('THEME').'/slider/'.$obj->path);
                $data['img'] = json_encode($obj);
            }
        }
        if($this->model->fill($data)->save()) {
            return ['status' => 'Слайдер добавлен'];
        }
    }


    public function updateSlider($request, $slider) {

        $data = $request->except('_token','image','image2','image3','image4','_method');
        if(empty($data)) {
            return array('error' => 'Нет данных');
        }
        //Псевдонимы
        if(empty($data['alias'])) {
            $data['alias'] = $this->transliterate($data['title']);
        }
        $result = $this->one($data['alias'], FALSE);
        if(isset($result->id) && ($result->id != $slider->id)) {
            $request->merge(array('alias' => $data['alias']));
            $request->flash();
            return ['error' => 'Данный псевдоним уже используется'];
        }
        // Изображение
        if($request->hasFile('image')) {
            $image = $request->file('image');
            if($image->isValid()) {
                $str = str_random(8);
                $obj = new \stdClass;
                $obj->path = $str.'.png';
                $img = Image::make($image);
                $img->save(public_path().'/'.env('THEME').'/slider/'.$obj->path);
                $data['img'] = json_encode($obj);
            }
        }
        $slider->fill($data);
        if($slider->update()) {
            return ['status'=> 'Слайдер обновлен'];
        }
    }

    public function deleteSlider($slider) {
        $slider->delete();
        if($slider->delete()) {
            return ['status' => 'Слайдер удален'];
        }
    }

}