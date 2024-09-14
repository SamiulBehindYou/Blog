<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    public function front_login(){
        return view('frontend.author_auth.login');
    }

    public function front_register(){
        return view('frontend.author_auth.register');
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

        return redirect(route('front.dashboard'))->withregistration('Registration pending for admin approval. We will notify you once approved your account!');
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
                    return redirect('/')->withSuccess('Successfully Logged In.');
                }
                else{
                    return back()->withErrors('Password does not matched!');
                }
            }
            else{
                return back()->withInfo('Your account under review, Onces approved, We will nofity you via email!');
            }
        }
        else{
            return back()->withErrors('Email not registerd!');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('author')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/front/login');
    }

}
