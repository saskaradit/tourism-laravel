<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function users() {
        return $this->belongsTo('App\User');
    }
    public function articleCategory() {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
}
