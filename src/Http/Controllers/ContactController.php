<?php

namespace Noh\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Noh\Contact\Models\Contact;

 class ContactController extends Controller
{
    //


    public function index()
    {

        return view("contact::contact");
    }


    public  function send(Request $request)
    {

        $request->validate([
            'name'=>'required|alpha',
            'email'=>'required|email',
            'message'=>'required|string',

        ]);

        $contact = Contact::create($request->all());

        return redirect(route("contact"))->with('success',config('contact.contact_form_successful_message'));
    }


}
