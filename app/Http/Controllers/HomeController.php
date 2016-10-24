<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Skill;
use App\Experience;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $birthday = $this->_getBirthdayYearDate();
        $skills = Skill::get();
        $experiences = Experience::get();

        return view('home', compact('birthday', 'skills', 'experiences'));
    }

    private function _getBirthdayYearDate() {
        $birthday_date = strtotime('1991-12-21 09:25:00');
        $now = time();
        $years = $now - $birthday_date;

        return floor($years/31536000);
    }
}
