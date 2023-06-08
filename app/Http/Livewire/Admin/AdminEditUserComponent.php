<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminEditUserComponent extends Component
{
    public $name;
    public $email;
    public $utype;


    public function mount($user_id){
        $user = User::find($user_id);
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->utype = $user->utype;
    }

    public function UpdateUser(){
        $this->validate([
            'name'=>'required',
            'email'=>'required',
            'utype' => 'required',
        ]);
        $user = User::find($this->user_id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->utype = $this->utype;
        $user->save();
        session()->flash('message','Utilisateur modifié');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-user-component');
    }
}
