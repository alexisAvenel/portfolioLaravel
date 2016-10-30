<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experiences';

    protected $fillable = ['start_date', 'end_date', 'job', 'society', 'link', 'description', 'is_job'];

    public function getDates() {
        return ['start_date', 'end_date'];
    }

    public function getFrenchFormat($date) {
        $day    = strftime('%d', strtotime($date));
        $month  = ucfirst(utf8_encode(strftime('%b', strtotime($date))));
        $year   = strftime('%y', strtotime($date));
        $s      = ' ';

        return $day . $s . $month . $s . $year;
    }
}
