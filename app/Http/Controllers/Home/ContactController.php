<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\StoreMessageRequest;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function StoreMessage(StoreMessageRequest $request)
    {
        $validated = $request->validated();

        $data = new Contact();
        $data->fill($validated)->save();

        return redirect()->back()->with('status', 'message-delivered');
    }

    public function ContactMessage()
    {
        $contact = Contact::query()->latest()->get();
        return view('admin.contact.all_messages', compact('contact'));
    }

    public function DeleteMessage($id)
    {
        Contact::query()->findOrFail($id)->delete();

        return redirect()->route('contact.message')->with('status', 'message-deleted');
    }
}
