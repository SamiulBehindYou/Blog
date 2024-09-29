<?php

namespace App\Livewire\Admin;

use App\Models\Setting;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Livewire\WithFileUploads;

class Settings extends Component
{
    use WithFileUploads;
    // Title
    public $title = '';

    public function updatetitle(){
        $this->validate([
            'title' => 'required',
        ]);
        Setting::find(1)->update(['title' => $this->title]);

        session()->flash('message', 'Title changed');
    }

    //Icon
    public $i_photo;
    public function updateIcon(){
        dd($this->i_photo);
        $this->validate([
            'icon' => 'required|mimes:png,jpg,gif|max:2048',
        ]);
        // $extension = $this->icon->extension();
        // $file_name = uniqid().'.'.$extension;

        // Setting::find(1)->update(['icon' => $file_name]);

        session()->flash('message', 'Icon changed');
    }

    // Facebook
    public $facebook = '';

    public function updateFacebook(){
        $this->validate([
            'facebook' => 'required|url',
        ]);
        Setting::find(1)->update(['facebook' => $this->facebook]);
        session()->flash('message', 'Link changed');
    }
    public function f_active(){
        $setting = Setting::find(1);
        if($setting->facebook_status == 0){
            $setting->update(['facebook_status' => 1]);
        }else{
            $setting->update(['facebook_status' => 0]);
        }
    }

    // Instagram
    public $instagram = '';

    public function updateInstagram(){
        $this->validate([
            'instagram' => 'required|url',
        ]);
        Setting::find(1)->update(['instagram' => $this->instagram]);
        session()->flash('message', 'Link changed');
    }
    public function i_active(){
        $setting = Setting::find(1);
        if($setting->instagram_status == 0){
            $setting->update(['instagram_status' => 1]);
        }else{
            $setting->update(['instagram_status' => 0]);
        }
    }

    // Twiter
    public $twiter = '';

    public function updateTwiter(){
        $this->validate([
            'twiter' => 'required|url',
        ]);
        Setting::find(1)->update(['twiter' => $this->twiter]);
        session()->flash('message', 'Link changed');
    }
    public function t_active(){
        $setting = Setting::find(1);
        if($setting->twiter_status == 0){
            $setting->update(['twiter_status' => 1]);
        }else{
            $setting->update(['twiter_status' => 0]);
        }
    }

    // Youtube
    public $youtube = '';

    public function updateYoutube(){
        $this->validate([
            'youtube' => 'required|url',
        ]);
        Setting::find(1)->update(['youtube' => $this->youtube]);
        session()->flash('message', 'Link changed');
    }
    public function y_active(){
        $setting = Setting::find(1);
        if($setting->youtube_status == 0){
            $setting->update(['youtube_status' => 1]);
        }else{
            $setting->update(['youtube_status' => 0]);
        }
    }



    public function render()
    {
        $settings = Setting::find(1);
        $this->reset();
        return view('livewire.admin.settings', compact('settings'));
    }
}
