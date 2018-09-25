<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class participants extends Model
{
    protected $table = 'participants'; //schema::create
    protected $primaryKey = 'id_events'
    public $timestamps = true;
    protected $fillAble = [
        'id_events',
        'nama', 
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
    	$this->belongsTo('App\events');
    }
}
