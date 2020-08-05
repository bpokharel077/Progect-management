<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    //
    protected $fillable =[

        'name',
        'days',
        'description',
        'company_id',
        'user_id',
    ];
    public function user(){
        return $this->belongsToMany('App\User');
    }
    public function company(){
        return $this->belongsTo('App\company');
    }
    public function comments()
    {
        return $this->morphMany('App\comment','commentable');
    }
}
