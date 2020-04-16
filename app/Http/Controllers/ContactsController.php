<?php

namespace App\Http\Controllers;

use App\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //    admin rewards
    public function getContacts() {
        $contacts = DB::table('contact')->paginate(5);
        return view('admin.contacts.contacts',compact('contacts'));
    }

    public function postContact(Request $request) {
        $contacts = new Contacts();
        $contacts->name = $request->get('name');
        $contacts->email = $request->get('email');
        $contacts->topic = $request->get('topic');
        $contacts->message = $request->get('message');
        $contacts->save();
        return back();
    }

    public function postEditContacts(Request $request) {
//        return $request->all();
        $contacts = Contacts::find($request->get('id'));
        $contacts->status_id = $request->get('status_id');
        $contacts->save();
        return redirect()->back();
    }

    public function getEditContacts($id) {
        $contact = Contacts::find($id);
        return view('admin.contacts.edit_contacts',[
            'contact'=>$contact
        ]);
    }

    public function postDeleteContacts(Request $request) {
        $contact = Contacts::find($request->get('id'));
        $contact -> delete();
        return redirect()->back();
    }


}
