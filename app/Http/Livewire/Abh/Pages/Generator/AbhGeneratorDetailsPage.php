<?php

namespace App\Http\Livewire\Abh\Pages\Generator;


use App\Rules\iptbm\MaxContact;
use App\View\Components\abh\AbhLayout;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AbhGeneratorDetailsPage extends Component
{
    public $generator;


    public $expertise;

    public $mobile;
    public $phone;
    public $fax;
    public $email;

    public function delete_expertise( $expertise): void
    {
        $expertise->delete();
        $this->emit('reloadPage');
    }
    public function save_expertise()
    {

    }


    public function delete_contact( $contact): void
    {
        $contact->delete();
        $this->emit('reloadPage');
    }
    public function save_mobile(): void
    {

    }
    public function save_phone(): void
    {

    }
    public function save_fax(): void
    {

    }
    public function save_email(): void
    {

    }


    public function rules()
    {

    }
    public function mount( $generator): void
    {
        $generator->load(['contacts','expertise','status','latest_agency_affiliated']);

    }
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $mobile=$this->generator->contacts()->where('type','mobile')->get();
        $phone=$this->generator->contacts()->where('type','phone')->get();
        $fax=$this->generator->contacts()->where('type','fax')->get();
        $email=$this->generator->contacts()->where('type','email')->get();
        return view('livewire.abh.pages.generator.abh-generator-details-page')
            ->with([
                'generator' => $this->generator,
                'mobile_number'=>$mobile,
                'phone_number'=>$phone,
                'fax_number'=>$fax,
                'email_address'=>$email
            ])
            ->layout(AbhLayout::class);
    }
}
