<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','img','alias','text','desc','category_id','keywords'];

    public function category() {
        return $this->belongsTo('App\Category');
    }
}
