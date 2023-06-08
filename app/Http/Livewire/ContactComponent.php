<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactComponent extends Component
{
    public function sendMail(){
        session()->flash('message','Votre message nous à été transmis');
    }

    public function render()
    {
        return view('livewire.contact-component');
    }
}
