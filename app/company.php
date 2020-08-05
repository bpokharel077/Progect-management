<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    //
    protected $fillable =[

        'name',
        'description',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function projects(){
        return $this ->hasmany('App\project');
    }

    public function comments()
    {
        return $this->morphMany('App\comment','commentable');
    }

}
