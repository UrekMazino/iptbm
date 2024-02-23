<?php

namespace App\Http\Livewire\Abh\Admin\Pages\Updates;

use App\Models\User;
use App\Notifications\iptbm\admin\AccountCreationNotif;
use App\View\Components\abh\admin\AbhAdminApp;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class AbhAccountDetails extends Component
{
    public $user;

    public $user_full_name;
   public $user_email;

   public $show_password=false;
   public $user_password;
   public $confirm_password;

   public $confirm_admin_password;

   public function distroy_account()
   {
       $admin= Auth::user();
       if(Hash::check($this->confirm_admin_password,$admin->password))
       {
           $this->user->delete();
            redirect()->route('abh.admin.all_accounts');
       }else{
           session()->flash('error_delete_admin', 'Invalid admin password.');
       }

   }
   public function disable_account(): void
   {
       $this->user->delete();
       $this->emit('reloadPage');
   }

   public function enable_account()
   {
       $this->user->restore();
       $this->emit('reloadPage');
   }


   public function save_password()
   {
       $this->validateOnly('user_password');
       $this->validateOnly('confirm_password');
       $this->user->password=Hash::make($this->user_password);
       $this->user->save();
       $this->user->notify(new AccountCreationNotif($this->user->name,$this->user->email, $this->user_password));
       session()->flash('password_change','Password updated successfully. An email was send containing the new users poassword.');
   }


   public function eye_toggle()
   {
       $this->show_password=!$this->show_password;
   }

   public function save_email()
   {
       $this->validateOnly('user_email');
       $this->user->email=$this->user_email;
       $this->user->email_verified_at=null;
       $this->user->save();
       $this->user->sendEmailVerificationNotification();
       $this->emit('reloadPage');
   }

    public function save_name()
    {
        $this->validateOnly('user_full_name');
        $this->user->name=$this->user_full_name;
        $this->user->save();
        $this->emit('reloadPage');
    }


    public function rules(): array
    {
        return[
            'user_full_name' =>[
                'required',
                'max:100',
            ],
            'user_email'=>[
                'required',
                'max:60',
                'email',
                Rule::unique('users','email')
            ],
            'user_password'=>[
                'required',
                Password::min(8)
                    ->letters()
                    ->numbers()
                    ->uncompromised(),
            ],
            'confirm_password'=>'required|same:user_password',
            'confirm_admin_password'=>[
                'required'
            ]
        ];
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }
    public function mount(User $account)
    {
        $this->user=$account;
        $this->user_full_name=$account->name;
        $this->user_email=$account->email;
    }
    public function render()
    {
        return view('livewire.abh.admin.pages.updates.abh-account-details')
            ->layout(AbhAdminApp::class);
    }
}
