<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class committees extends Model
{
	use Notifiable;
	
    protected $table = 'committees';
    protected $primaryKey = 'id_events'
    public $timestamps = true;
    protected $fillAble = [
        'id_events',

        'jabatan', 
        'id_user', 

        'tanggung_jawab'
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
