<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use Mail;
class ContactController extends Controller
{
    public function showForm(Request $request){
        return view('welcome');
    }

    public function storeForm(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        ContactUs::create($request->all());

        \Mail::send('email', array (
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'form_message' => $request->get('message')
        ), function ($message) use ($request) {
            $message->from($request->email);
            $message->to('ejike.chuks.dev@gmail.com', 'Hello Admin')->subject($request->get('subject'));
        });

        return back()->with('Thank you for contacting me');
    }
}
