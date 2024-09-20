<?php

namespace App\Http\Controllers;

use App\Models\Subscrib;
use Illuminate\Http\Request;

class SubscribController extends Controller
{
    public function subscrib(Request $request){
        $request->validate([
            'email' => 'required|unique:subscribs,subscriber',
        ]);

        Subscrib::create([
            'subscriber' => $request->email,
        ]);
        return back()->withSuccess('Email subscribed successfully!');
    }
}
