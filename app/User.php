<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email', 
        'password',
        'roll_id',
        'first_name',
        'middle_name',
        'last_name',
        'city',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function tasks()
    {
        return $this->belongsToMany('App\task');
    }
    public function comments()
    {
        return $this->morphMany('App\comment','commentable');
    }
    public function role()
    {
        return $this->belongsTo('App\role');
    }
    public function companies()
    {
        return $this->hasMany('App\company');
    }
    public function projects()
    {
        return $this->belongsToMany('App\project');
    }
}
