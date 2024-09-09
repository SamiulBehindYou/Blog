<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class DashboardController extends Controller
{
    public function dashboard(){
        $users = User::all();
        return view('admin.dashboard', compact('users'));
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
