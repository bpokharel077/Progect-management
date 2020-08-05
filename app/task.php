<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    //
    protected $fillable =[

        'name',
        'days',
        'hours',
        'user_id',
        'project_id',
        'company_id',
        
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function project(){
        return $this->belongsTo('App\project');
    }
    public function company(){
        return $this->belongsTo('App\company');
    }
    public function users(){
        return $this->belongsToMany('App\User');
    }
    public function comments()
    {
        return $this->morphMany('App\comment','commentable');
    }
}
