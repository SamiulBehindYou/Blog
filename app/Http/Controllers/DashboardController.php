<?php

namespace App\Http\Controllers;

use App\Mail\AuthorActiveMail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Author;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;

class DashboardController extends Controller
{
    public function dashboard(){
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }

    public function authors(){
        $authors = Author::all();
        return view('admin.authors.authors', compact('authors'));
    }

    public function author_status($id){
        $author = Author::find($id);
        if($author->status == 0){
            $author->status = 1;
            $author->save();
            $subject = 'Congratulations';
            $message = 'Account activated!';
            Mail::to($author->email)->send(new AuthorActiveMail($subject, $message));
        }
        else{
            $author->status = 0;
            $author->save();
        }
        return back()->withSuccess('Author status updated!');
    }
    public function author_delete($id){
        Author::find($id)->delete();
        return back()->withSuccess('Author has been deleted by the admin!');
    }

    public function delete_user($id){
        User::find($id)->delete();

        return back()->withSuccess('User deleted successfully!');
    }

    public function edit_profile(){
        return view('admin.profile.edit_profile');
    }

    public function new_register(){
        return view('admin.auth.register');
    }

    public function admin_register(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect(route('dashboard', absolute: false))->withSuccess('Admin registered successfully!');
    }
}
