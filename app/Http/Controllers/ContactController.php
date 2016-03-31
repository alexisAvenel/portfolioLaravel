<?php
namespace App\Http\Controllers;

use \Request;
use \Input;

/**
* 
*/
class ContactController extends Controller
{
	
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		return view('contact');
	}

}