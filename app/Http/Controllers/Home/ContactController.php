<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function StoreMessage(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ], [
            'name.required' => 'Enter your Name',
            'email.required' => 'Email is required',
            'subject.required' => 'Subject is required',
            'phone.required' => 'Enter your phone number',
            'message.required' => 'Enter your message',
        ]);

        Contact::query()->insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now('GMT+3'),
        ]);

        $notification = [
            'message' => 'Your message sended successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function ContactMessage()
    {
        $contact = Contact::query()->latest()->get();
        return view('admin.contact.all_messages', compact('contact'));
    }

    public function DeleteMessage($id)
    {
        Contact::query()->findOrFail($id)->delete();

        $notification = [
            'message' => 'Message deleted',
            'alert-type' => 'success'
        ];

        return redirect()->route('contact.message')->with($notification);
    }
}
