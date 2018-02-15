<?php namespace App\Http\Controllers;

use App\Events\ContactNotify;
use App\Http\Requests\ContactCreateRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact-us');
    }

    /**
     * @param ContactCreateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(ContactCreateRequest $request)
    {
        $contact = Contact::create($request->all());

        event(new ContactNotify($contact));

        return redirect()->back();
    }
}
