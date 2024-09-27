<?php

namespace App\Livewire\Admin;

use App\Models\Contact as ModelsContact;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Contact extends Component
{
    #[Validate('required')]
    public $name = '';
    #[Validate('required')]
    public $email = '';
    #[Validate('required')]
    public $subject = '';
    #[Validate('required')]
    public $message = '';

    public function sent(){
        $this->validate();
        ModelsContact::create(
            $this->all()
        );

        session()->flash('message', 'Message sent');

        return back();
    }

    public function render()
    {
        return view('livewire.frontend.contact');
    }
}
