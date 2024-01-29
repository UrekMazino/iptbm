<?php

namespace App\Http\Livewire\Abh\Pages\Generator;

use App\Models\abh\AbhGenerator;
use App\Models\abh\AbhGeneratorExpertise;
use App\Models\abh\AbhGeneratorsContac;
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

    public function delete_expertise(AbhGeneratorExpertise $expertise): void
    {
        $expertise->delete();
        $this->emit('reloadPage');
    }
    public function save_expertise()
    {
        $this->validateOnly('expertise');
        $this->generator->expertise()->save(new AbhGeneratorExpertise([
            'field'=>$this->expertise
        ]));
        $this->emit('reloadPage');
    }


    public function delete_contact(AbhGeneratorsContac $contact): void
    {
        $contact->delete();
        $this->emit('reloadPage');
    }
    public function save_mobile(): void
    {
        $this->validateOnly('mobile');
        $this->generator->contacts()->save(new AbhGeneratorsContac([
            'contact'=>$this->mobile,
            'type'=>'mobile'
        ]));
        $this->emit('reloadPage');
    }
    public function save_phone(): void
    {
        $this->validateOnly('phone');
        $this->generator->contacts()->save(new AbhGeneratorsContac([
            'contact'=>$this->phone,
            'type'=>'phone'
        ]));
        $this->emit('reloadPage');
    }
    public function save_fax(): void
    {
        $this->validateOnly('fax');
        $this->generator->contacts()->save(new AbhGeneratorsContac([
            'contact'=>$this->fax,
            'type'=>'fax'
        ]));
        $this->emit('reloadPage');
    }
    public function save_email(): void
    {
        $this->validateOnly('email');
        $this->generator->contacts()->save(new AbhGeneratorsContac([
            'contact'=>$this->email,
            'type'=>'email'
        ]));
        $this->emit('reloadPage');
    }


    public function rules()
    {
        return[
            'expertise' =>'required|max:60',
            'mobile'=>[
                'required',
                'digits:11',
                Rule::unique(AbhGeneratorsContac::class,'contact')
                    ->where('abh_generator_id', $this->generator->id)
                ->where('type', 'mobile'),
                new MaxContact(
                    3,
                    'abh_generators_contacs',
                    'contact',
                    'type',
                    'mobile',
                    'abh_generator_id',
                    $this->generator->id,
                    'Mobile number was already reached its maximum limit.'
                ),
            ],
            'phone'=>[
                'required',
                'min_digits:9',
                'max_digits:10',
                Rule::unique(AbhGeneratorsContac::class,'contact')
                    ->where('abh_generator_id', $this->generator->id)
                    ->where('type', 'phone'),
                new MaxContact(
                    3,
                    'abh_generators_contacs',
                    'contact',
                    'type',
                    'phone',
                    'abh_generator_id',
                    $this->generator->id,
                    'Phone number was already reached its maximum limit.'
                ),
            ],
            'fax'=>[
                'required',
                'min_digits:9',
                'max_digits:10',
                Rule::unique(AbhGeneratorsContac::class,'contact')
                    ->where('abh_generator_id', $this->generator->id)
                    ->where('type', 'fax'),
                new MaxContact(
                    3,
                    'abh_generators_contacs',
                    'contact',
                    'type',
                    'fax',
                    'abh_generator_id',
                    $this->generator->id,
                    'Fax number was already reached its maximum limit.'
                ),
            ],
            'email'=>[
                'required',
                'email',
                'max:60',
                Rule::unique(AbhGeneratorsContac::class,'contact')
                    ->where('abh_generator_id', $this->generator->id)
                    ->where('type', 'email'),
                new MaxContact(
                    3,
                    'abh_generators_contacs',
                    'contact',
                    'type',
                    'email',
                    'abh_generator_id',
                    $this->generator->id,
                    'Email address was already reached its maximum limit.'
                ),
            ],

        ];
    }
    public function mount(AbhGenerator $generator): void
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
