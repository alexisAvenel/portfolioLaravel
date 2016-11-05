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
        $month  = strftime('%b', strtotime($date));
        $year   = strftime('%y', strtotime($date));
        $s      = ' ';

        return $day . $s . utf8_encode(ucfirst($month)) . $s . $year;
    }
}
