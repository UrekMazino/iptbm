<?php

namespace App\Http\Livewire\Abh\Profile;

use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Livewire\Component;
use Livewire\WithFileUploads;
use Storage;

class ProfileTagNLogo extends Component
{
    use WithFileUploads;

    public $photo;
    public $profile;

    public $tagline;

    public function saveTagline(): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $this->validateOnly('tagline');
        $this->profile->tag_line = $this->tagline;
        $this->profile->save();
        return redirect(route("abh.staff.profile"));
    }

    public function resetTagline(): void
    {
        $this->resetValidation(['tagline']);
        $this->reset('tagline');

    }


    public function savePhoto()
    {
        $this->validateOnly('photo');
        $path = $this->photo->store('/public/abh/profile-logo');
        if (Storage::exists($this->profile->logo)) {
            Storage::delete($this->profile->logo);
        }
        $this->profile->logo = $path;

        $this->profile->save();
        session()->flash('profile_photo', "uploaded successfully!");
        return redirect(route("abh.staff.profile"));
    }


    public function reseter(): void
    {
        $this->resetValidation(['photo']);
        $this->reset('photo');
    }

    public function rules(): array
    {
        return [
            'photo' => [
                'required',
                'mimes:png,jpeg',
                'max:20480'
            ],
            'tagline' => [
                'required',
                'unique:abh_profiles,tag_line',
                'max:200'
            ]
        ];
    }

    public function updated($props): void
    {
        $this->validateOnly($props);
    }


    public function mount($profile)
    {
        $this->profile = $profile;

    }

    public function render()
    {
        return view('livewire.abh.profile.profile-tag-n-logo');
    }
}
