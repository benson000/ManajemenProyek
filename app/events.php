<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    protected $table = 'events';
    public $timestamps = true;
    protected $fillable = [
        'id_events',
        'name',

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
