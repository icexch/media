<?php namespace App\Http\Controllers;

use App\Events\ContactNotify;
use App\Http\Requests\ContactCreateRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $dashboardRoute = route('home');
        $accountRoute = null;

        if(auth()->check()) {
            $dashboardRoute = auth()->user()->isAdvertiser() ? route('advertiser.dashboard') : route('publisher.dashboard');
            $accountRoute = auth()->user()->isAdvertiser() ? route('advertiser.account.edit') : route('publisher.account.edit');
        }

        return view('contact-us', compact('dashboardRoute', 'accountRoute'));
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
