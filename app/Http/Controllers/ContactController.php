<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;

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

	public function sendMail(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6',
            'messsage' => 'required|min:10',
            'email' => 'email',
            'g-recaptcha-response'  => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if($this->captchaCheck() == false)
        {
            return redirect()->back()
                ->withErrors(['Wrong Captcha'])
                ->withInput();
        }

        echo 'on peut envoyer le mail ';
        die();

    }

}