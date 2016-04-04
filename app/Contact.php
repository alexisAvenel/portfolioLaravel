<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    public $timestamps = false;
    
    protected $table = 'contacts';

    protected $fillable = ['name', 'email', 'message', 'date', 'answered', 'answered_at'];

    public function getDates() {
        return ['date', 'answered_at'];
    }
}
