<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;

class AboutController extends Controller
{
    public function create()
    {
        return view('about.contact');
    }

    public function store(ContactFormRequest $request)
    {
        return \Redirect::route('contact')
            ->with('message', 'Merci de votre message !');
    }

}
