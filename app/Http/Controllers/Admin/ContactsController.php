<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use Mail;
use App\Contact;
use App\User;

class ContactsController extends Controller
{

    public function index() {
        $contacts = Contact::orderBy('date', 'DESC')->paginate(10);

        return view('admin.contacts.index', compact('contacts'));
    }

    public function sendAnswer($id) {

        $contact = Contact::findOrFail($id);

        return view('admin.contacts.send-answer', compact('contact'));
    }


    public function sendMail(Request $request, $id) {

        $contact = Contact::findOrFail($id);

        if(!$contact) {
            return false;
        }

        $validator = Validator::make($request->all(), [
            'message' => 'required|min:10'
        ]);

        if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }

        if($this->_sendMailToContact($request->all(), $contact)) {
            return redirect('adminContacts');
        } else {
            return redirect('adminContactsSend')->back()
                                      ->withErrors(["La réponse n'a pas pu être envoyée."])
                                      ->withInput();
        }
    }

    private function _sendMailToContact($arguments, $contact) {
        $user = User::find(1)->toArray();

        $message = $arguments['message'];
        $email   = $contact->email;

        $contact->answered     = 1;
        $contact->answered_at  = date('Y-m-d');

        $isMailSend = $contact->update();

        $isMailSend = Mail::send('emails.contact', $user, function ($mail) use ($message, $email) {
            $mail->to($email)->subject($message);
        });

        return $isMailSend;
    }

    /*** AJAX ***/

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMessage(Request $request)
    {
        $data = new \stdClass();
        if($request->ajax()){
            $contactId = $request->input('contact_id');
            $data->message = "Aucun message ne correspond à cet identifiant";

            $contact = Contact::findOrFail($contactId);
            if($contact) {
                $data->message = "";
                $data->contact = $contact;
            }
            return response()->json([
                'data' => $data
            ]);
        }
    }

}
