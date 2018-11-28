<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class committees extends Model
{
    protected $table = 'committees';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id_events',

        'jabatan', 
        'id_user',
        'nama',
        'password',
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
