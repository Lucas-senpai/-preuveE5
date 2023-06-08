<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CheckoutComponent extends Component
{

    public function confirmCommande(){
        session()->flash('message','Votre commande a bien été enregistrée');
    }

    public function render()
    {
        return view('livewire.checkout-component');
    }
}
