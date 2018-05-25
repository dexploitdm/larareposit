<?php

namespace App\Repositories;

use Config;

abstract class Repository {

    protected $model = FALSE;


    public function get($select = '*', $take = FALSE, $pagination = FALSE, $where = FALSE){

        $builder = $this->model->select($select);
        if($take) {
            $builder->take($take);
        }
        if($where) {
            $builder->where($where[0],$where[1]);
        }

        if($pagination) {
            return $this->check($builder->paginate(Config::get('settings.paginate')));
        }
        return $this->check($builder->get());
    }
    public function get_blogs($select = '*', $take = FALSE, $pagination = FALSE, $where = FALSE){
        $builder = $this->model->select($select);
        if($take) {
            $builder->take($take);
        }
        if($where) {
            $builder->where($where[0],$where[1]);
        }
        if($pagination) {
            return $this->check($builder->paginate(Config::get('settings.paginate_blogs')));
        }
        return $this->check($builder->get());
    }

    public function filterGet($select = '*', $where = FALSE, $num = FALSE){
        $builder = $this->model->select($select);
        if($where) {
            $builder->where('filter', '=', $num);
        }
        return $this->check($builder->get());
    }
    public function LogoGet($select = '*', $where = FALSE, $num = FALSE){
        $builder = $this->model->select($select);
        if($where) {
            $builder->where('filter', '=', $num);
        }
        return $this->check($builder->get());
    }


    public function one($alias, $atrr = array()) {
        $result = $this->model->where('alias', $alias)->first();
        return $result;
    }




    protected function check($result) {
        if($result->isEmpty()) {
            return FALSE;
        }
        $result->transform(function($item, $key) {
            //Если содержится строка!?
            if(is_string($item->img) &&
                is_object(json_decode($item->img)) &&
                (json_last_error() == JSON_ERROR_NONE)) {
                $item->img = json_decode($item->img);
            }
            if(is_string($item->img2) &&
                is_object(json_decode($item->img2)) &&
                (json_last_error() == JSON_ERROR_NONE)) {
                $item->img2 = json_decode($item->img2);
            }
            if(is_string($item->img3) &&
                is_object(json_decode($item->img3)) &&
                (json_last_error() == JSON_ERROR_NONE)) {
                $item->img3 = json_decode($item->img3);
            }
            if(is_string($item->img4) &&
                is_object(json_decode($item->img4)) &&
                (json_last_error() == JSON_ERROR_NONE)) {
                $item->img4 = json_decode($item->img4);
            }
            return $item;
        });
        return $result;
    }




    public function transliterate($string) {
        $str = mb_strtolower($string, 'UTF-8');

        $leter_array = array(
            'a' => 'а',
            'b' => 'б',
            'v' => 'в',
            'g' => 'г,ґ',
            'd' => 'д',
            'e' => 'е,є,э',
            'jo' => 'ё',
            'zh' => 'ж',
            'z' => 'з',
            'i' => 'и,і',
            'ji' => 'ї',
            'j' => 'й',
            'k' => 'к',
            'l' => 'л',
            'm' => 'м',
            'n' => 'н',
            'o' => 'о',
            'p' => 'п',
            'r' => 'р',
            's' => 'с',
            't' => 'т',
            'u' => 'у',
            'f' => 'ф',
            'kh' => 'х',
            'ts' => 'ц',
            'ch' => 'ч',
            'sh' => 'ш',
            'shch' => 'щ',
            '' => 'ъ',
            'y' => 'ы',
            '' => 'ь',
            'yu' => 'ю',
            'ya' => 'я',
        );

        foreach($leter_array as $leter => $kyr) {
            $kyr = explode(',',$kyr);

            $str = str_replace($kyr,$leter, $str);

        }

        //  A-Za-z0-9-
        $str = preg_replace('/(\s|[^A-Za-z0-9\-])+/','-',$str);

        $str = trim($str,'-');

        return $str;
    }



}

?>