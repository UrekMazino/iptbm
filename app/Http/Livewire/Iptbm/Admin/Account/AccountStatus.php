<?php

namespace App\Http\Livewire\Iptbm\Admin\Account;

use Livewire\Component;

class AccountStatus extends Component
{
    public $user;

    public function enable_account(): void
    {
        $this->user->restore();
        $this->emit('reloadPage');
    }

    public function disable_account(): void
    {
        $this->user->delete();
        $this->emit('reloadPage');
    }
    public function mount($user)
    {
        $this->user=$user;
    }
    public function render()
    {
        return view('livewire.iptbm.admin.account.account-status');
    }
}
