<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
