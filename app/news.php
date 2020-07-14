<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class news extends Model
{

    protected $appends = [
        'views',
        'unicUsers',
    ];


    public function category()
    {
        return $this->belongsTo('App\category');
    }

    public function userName()
    {
        return $this->hasOne('App\User')->select('name');
    }

    public function status()
    {
        return $this->belongsTo('App\status')->select('name');
    }

    public function getViewsAttribute()
    {
        $name =  Redis::get('NewsItem-views-'.$this->id);

       return $name;

    }

    public function getUnicUsersAttribute() //todo
    {
        return Redis::get('NewsItem-'.$this->id.'-UnicUsers');
    }

}
