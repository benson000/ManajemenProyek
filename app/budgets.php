<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class budgets extends Model
{
    protected $table = 'budgets';
    protected $primaryKey = 'id_events'
    public $timestamps = true;
    protected $fillAble = [
        'id_events', 
        'keterangan',
        'saldo'
    ];
    protected $hidden = [
        'id',

        //default timestamps 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    public function events(){
    	return $this->hasMany('App\events');
    }
}
