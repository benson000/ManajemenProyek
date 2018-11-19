<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class participants extends Model
{
    protected $table = 'participants'; //schema::create
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id_events',
        'id_peserta',
        'password',
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
    	return $this->belongsTo('App\events');
    }
}
