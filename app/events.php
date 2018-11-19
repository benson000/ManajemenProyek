<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id_user';
    public $timestamps = true;
    protected $fillAble = [
        'id_user',

        'start_date', 
        'end_date', 

        'place', 
        'theme', 
        'category', 
        
        'tujuan'
    ];
    protected $hidden = [
        'id',

        //default timestamps 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    //up
    public function categories(){
    	return $this->belongsTo('App\categories');
    }

    public function budgets(){
        return $this->belongsTo('App\budgets');
    }

    //down
    public function participants(){
    	return $this->hasMany('App\participants');
    }

    public function activities(){
    	return $this->hasMany('App\activities');
    }

    public function committees(){
    	return $this->hasMany('App\committees');
    }

    public function Users(){
    	return $this->hasMany('App\Users');
    }
}
