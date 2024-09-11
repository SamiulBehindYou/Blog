<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProfileController extends Controller
{

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function image_update(Request $request){
        $request->validate([
            'image' => 'required|mimes:png,jpg|max:2048',
        ]);

        $update = User::find(Auth::user()->id);

        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $imageName = uniqid().'.'.$ext;
        if(!$update->image == null){
            unlink(public_path('uploads/users/'.$update->image));
        }
        $update->image = $imageName;
        $update->save();

        // create new image instance
        $manager = new ImageManager(Driver::class);
        $img = $manager->read($image);

        $img->cover(250, 250);
        $img->save(public_path('uploads/users/'.$imageName));

        return back()->withSuccess('Photo updated successfully!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {

        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
