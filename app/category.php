<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{

    public $timestamps = false;

    public function news()
    {
        return $this->hasMany('App\news');
    }


}
