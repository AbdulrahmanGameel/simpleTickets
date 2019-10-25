<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{ 
    // Table Name
    protected $table ='reservations';
    
    //TimeStamps
    public $timestamps = true;
    public function user(){
        return $this->belongsTo('App\User');
    }
}
