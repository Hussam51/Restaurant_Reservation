<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactUsMail;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{
    public function index()
    {
        $specials = Category::where('name', 'specials')->first();

        return view('welcome', compact('specials'));
    }
    public function thankyou()
    {
        return view('thankyou');
    }
    public function ContactUs(Request $request)
    {
        $details = [
            'email' => $request->email,
            'message' => $request->message
        ];
        $validated = Validator(
            $request->all(),
            [
                'email' => 'required|email',
                'message' => 'required'
            ]
        );
        $user = User::first();

        Mail::to($user->email)
        ->send(new ContactUsMail($details));
        return redirect()->route('welcome')->with('success', 'Send mail successfully');
    }
}
