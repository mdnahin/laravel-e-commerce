<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;
class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        if ( ! Newsletter::isSubscribed($request->subs_email) ) {
            Newsletter::subscribePending($request->subs_email);

            return back()->with('Success','Please Check your email.');
        }
        return back()->with('Failed','Your are already subscribed.');
    }
}
