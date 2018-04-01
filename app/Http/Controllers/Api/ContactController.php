<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ContactRequest;
use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create(ContactRequest $request)
    {
        $contact = new Contact();
        $contact->setFirstName($request->getFirstName());
        $contact->setLastName($request->getLastName());
        $contact->setEmail($request->getEmail());
        $contact->setMessage($request->getMessage());
        $contact->save();

        $this->sendEmail($contact);
    }

    private function sendEmail($message)
    {
        $contact = Contact::find($message->id);

        Mail::to('organizers@southeastphp.com')->send(new ContactMail($contact));
    }
}
