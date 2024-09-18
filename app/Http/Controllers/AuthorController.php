<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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

    public function edit_page(){
        return view('frontend.author_controls.profile.edit_profile');
    }

    public function update_profile(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $author = Author::find(Auth::guard('author')->user()->id);

        $author->name = $request->name;
        $author->email = $request->email;
        $author->save();

        return back()->withSuccess('Profile updated successfully!');
    }

    public function image_update(Request $request){
        $request->validate([
            'image' => 'required|mimes:png,jpg|max:2048',
        ]);

        $update = Author::find(Auth::guard('author')->user()->id);

        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $imageName = uniqid().'.'.$ext;
        if(!$update->image == null){
            unlink(public_path('uploads/authors/'.$update->image));
        }
        $update->image = $imageName;
        $update->save();

        // create new image instance
        $manager = new ImageManager(Driver::class);
        $img = $manager->read($image);

        $img->cover(250, 250);
        $img->save(public_path('uploads/authors/'.$imageName));

        return back()->withSuccess('Photo updated successfully!');
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
