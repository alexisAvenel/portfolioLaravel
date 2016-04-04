<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use App\Contact;

class ContactsController extends Controller
{

    public function index() {
        $contacts = Contact::orderBy('date', 'DESC')->paginate(2);

        return view('admin.contacts.index', compact('contacts'));
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
