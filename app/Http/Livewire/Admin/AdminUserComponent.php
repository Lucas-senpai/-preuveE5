<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminUserComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function destroy($id)
    {
        $users = User::query()->findOrFail($id);
        $users->delete();
        session()->flash('message','Utilisateur supprimé');
    }

    public function render()
    {
        $users = User::orderBy('id')->paginate(8);
        return view('livewire.admin.admin-user-component',['users'=>$users]);
    }
}
