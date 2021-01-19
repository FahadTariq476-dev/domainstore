<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contact;
class ContactController extends Controller
{
    public function Save(Request $request){
    	$request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $contact = new contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');
        $contact->save();
        return redirect()->back()->with('message', 'Message has been sent');
    }
}
