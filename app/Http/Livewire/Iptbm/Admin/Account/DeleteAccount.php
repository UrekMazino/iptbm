<?php

namespace App\Http\Livewire\Iptbm\Admin\Account;

use App\Models\User;
use Livewire\Component;

class DeleteAccount extends Component
{
    public function deleteAccount()
    {

    }

    public function mount(User $user)
    {

    }

    public function render()
    {
        return view('livewire.iptbm.admin.account.delete-account');
    }
}
