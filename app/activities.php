<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class activities extends Model
{
    protected $table = 'activities';
    protected $primaryKey = 'id_events'
    public $timestamps = true;
    protected $fillAble = [
        'id_events',

        'start_date', 
        'end_date', 

        'keterangan'
    ];
    protected $hidden = [
        'id',

        //default timestamps 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    public function events(){
    	return $this->belongsTo('App\events');
    }
}
