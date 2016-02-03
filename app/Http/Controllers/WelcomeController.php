<?php
namespace App\Http\Controllers;

use \Request;
use \Input;


/**
* 
*/
class WelcomeController extends Controller
{
	
	public function __construct()
	{
		$this->middleware('ip');
	}

	public function index()
	{
		return view('welcome');
	}

}