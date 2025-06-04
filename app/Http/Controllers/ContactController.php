<?php

namespace App\Http\Controllers;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
{
    return view('contact');
}

public function submit(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required|string'
    ]);

    // Send email
    Mail::to('progdevsita@gmail.com')->send(new ContactFormMail($validated));

    return back()->with('success', 'Merci pour votre message! Nous vous contacterons bientôt.');
}
}
