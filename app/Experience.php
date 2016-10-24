<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experiences';

    protected $fillable = ['start_date', 'end_date', 'job', 'society', 'link', 'description'];

    public function getDates() {
        return ['start_date', 'end_date'];
    }
}
