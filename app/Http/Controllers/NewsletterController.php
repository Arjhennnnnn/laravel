<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newletter)
    {
        // ddd($newletter);
        request()->validate(['email' => 'required|email']);
        try{
            $newletter->subscribe(request('email'));
        }
        catch(\Exception $e){
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.'
            ]);
        }
        
    
        return back()->with('message','You are signed up for our newletter');
    }
}
