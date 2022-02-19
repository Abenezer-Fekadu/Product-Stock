<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Feedback;
use Illuminate\Support\Facades\Mail;



class FeedbackController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function email(Request $request){

        Mail::to('se.abenezer.fekadu@gmail.com')->send(new Feedback($request));
        return redirect()->back();
    }
}
