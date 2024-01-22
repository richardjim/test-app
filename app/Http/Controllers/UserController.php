<?php

namespace App\Http\Controllers;

use App\Helpers\EmailHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $image = $request->file('file')->store('profile_pictures', 'public');

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'file' => $image,
        ]);

        EmailHelper::sendConfirmationEmail($user);

        return redirect()->route('home')->with('success', 'Registration successful. Confirmation email sent.');
    }
}
