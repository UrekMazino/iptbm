<?php

namespace App\Http\Livewire\Iptbm\Admin;

use App\Models\iptbm\IptbmAgency;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class UserAccount extends Component
{
    public $user;
    public $agencies;
    public $userNameModel;
    public $showUserModel = false;

    public $adminPassword;
    public $rule = [
        'adminPassword' => [
            'required'
        ]
    ];
    public $emailModel;
    public $showEmailModel = false;
    public $showPasswordForm = false;
    public $passwordModel;
    public $passwordConfirmationModel;
    public $showPassword = false;
    public $validationAttributes = [
        'passwordModel' => 'Password',
        'passwordConfirmationModel' => 'Password Confirmation',
        'emailModel' => 'Email address',
        'userNameModel' => 'Full name'
    ];
    public $messages = [
        'passwordConfirmationModel.same' => 'Password Confirmation did not match',

    ];

    public function deleteAccount()
    {
        $admin = Auth::user();
        if (Hash::check($this->adminPassword, $admin->password)) {
            $this->user->delete();
            redirect()->route('iptbm.admin.addrecord.account');
        } else {

            session()->flash('error', 'Invalid admin password.');
        }
    }

    public function toggleShowUserNameModel()
    {
        $this->showUserModel = !$this->showUserModel;
        $this->resetValidation(['userNameModel']);
        $this->userNameModel = $this->user->name;
    }

    public function saveName()
    {
        $this->validateOnly('userNameModel');
        $this->user->name = $this->userNameModel;
        $this->user->save();
        session()->flash('userNameModel', 'Name updated successfully');
    }

    public function toggleShowEmailModel()
    {
        $this->showEmailModel = !$this->showEmailModel;
        $this->resetValidation('showEmailModel');
        $this->emailModel = $this->user->email;
    }

    public function saveEmail()
    {
        $this->validateOnly('emailModel');
        $this->user->email = $this->emailModel;
        $this->user->save();
        session()->flash('emailModel', 'Users email updated successfully');
    }

    public function tooggleShowPassword()
    {
        $this->showPasswordForm = !$this->showPasswordForm;
    }

    public function savePassword()
    {
        $this->validateOnly('password');
        $this->validateOnly('passwordConfirmationModel');

        $this->user->password = Hash::make($this->passwordModel);
        $this->user->save();
        $this->resetValidation([
            'passwordModel',
            'passwordConfirmationModel'
        ]);
        $this->reset([
            'passwordModel',
            'passwordConfirmationModel'
        ]);
        session()->flash('passwordModel', 'Password updated successfully');
    }

    public function rules()
    {


        return [
            'userNameModel' => [
                'required',
                'min:5'
            ],
            'emailModel' => [
                'required',
                'email',
                'unique:users,email',
            ],
            'passwordModel' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->numbers()
                    ->uncompromised()
            ],
            'passwordConfirmationModel' => 'required|same:passwordModel'

        ];
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function mount($user)
    {

        $this->agencies = IptbmAgency::all();
        $this->user = $user;
        $this->userNameModel = $user->name;
        $this->emailModel = $this->user->email;

    }

    public function render()
    {
        return view('livewire.iptbm.admin.user-account');
    }
}
