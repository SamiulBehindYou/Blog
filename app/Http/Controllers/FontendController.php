<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;


class FontendController extends Controller
{
    public function font_dashboard(){
        return view('fontend.dashboard');
    }
    public function font_login(){
        return view('fontend.author_auth.login');
    }
    public function font_register(){
        return view('fontend.author_auth.register');
    }
    public function author_store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Author::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        Author::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('font.dashboard'))->withregistration('Registration pending for admin approval. We will notify you once approved your account!');
    }
    public function author_login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $author = Author::where('email', $request->email);

        if($author->exists()){
            if($author->first()->status == 1){
                if(Auth::guard('author')->attempt(['email' => $request->email, 'password' => $request->password])){
                    redirect(route('font.dashboard'))->withSuccess('Successfully Logged In.');
                }
                else{
                    return back()->withErrors('Password does not matched!');
                }
            }
            else{
                return back()->withErrors('Your account under review, Onces approved, We will nofity you via email!');
            }
        }
        else{
            return back()->withErrors('Email not registerd!');
        }
    }
}
