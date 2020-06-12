<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contactstore(Request $request)
    {
        $this->validate($request,[
            'address'=> 'required',
            'phone'=> 'required',
            'email'=> 'required',
        ]);
        $app_contact_id = 1;
        $app_contact = ContactUs::find($app_contact_id);
        if ($app_contact == null) {
            $contact = new ContactUs();
            $contact->address = $request->address;
            $contact->phone = $request->phone;
            $contact->email = $request->email;
            $contact->facebook = $request->facebook;
            $contact->instagram = $request->instagram;
            $contact->twitter = $request->twitter;
            $contact->youtube = $request->youtube;
            $contact->whatsapp = $request->whatsapp;
            $contact->save();
        }else{
            $contact = $app_contact;
            $contact->address = $request->address;
            $contact->phone = $request->phone;
            $contact->email = $request->email;
            $contact->facebook = $request->facebook;
            $contact->instagram = $request->instagram;
            $contact->twitter = $request->twitter;
            $contact->youtube = $request->youtube;
            $contact->whatsapp = $request->whatsapp;
            $contact->save();
        }
        return back();
    }
}
