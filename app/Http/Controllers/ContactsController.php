<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Traits\CaptchaTrait;
//use Illuminate\Support\Facades\Mail;
use App\Contact;

/**
* 
*/
class ContactsController extends Controller
{
	use CaptchaTrait;

	public function __construct()
	{

	}

	public function index()
	{
		return view('contact');
	}

	public function sendMail(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6',
            'email' => 'email',
            'message' => 'required|min:10',
            'g-recaptcha-response'  => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }

        if($this->captchaCheck() == false)
        {
            return redirect()->back()
                ->withErrors(['Wrong Captcha'])
                ->withInput();
        }

        if($this->_sendMailToWebmaster($request->all())) {
            return redirect('contact')->with('status', 'Votre demande a bien été envoyée.');
        } else {
            return redirect('contact')->back()
                                      ->withErrors(["Votre demande n'a pas pu être envoyée."])
                                      ->withInput();
        }
    }

    private function _sendMailToWebmaster($arguments) {

        $message = $arguments['message'];
        $email   = ($arguments['email']) ? $arguments['email'] : '';
        $name    = $arguments['name'];

        $data['name']  = $name;
        $data['email'] = $email;
        $data['message']  = $message;
        $data['date']  = date('Y-m-d H:i:s');

        $isMailSend = Contact::create($data);

        /*$isMailSend = Mail::send('contact', ['name', $name], function ($mail) use ($messageContent) {
            $mail->to(env('MAIL_USERNAME'), "Alexis")->subject($messageContent);
        });*/

        return $isMailSend;
    }

}