<?php

namespace App\Http\Livewire\Abh\Technology;

use App\Models\abh\AbhGenerator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class TechnologyGenerator extends Component
{
    public $technology;
    public $first_name;
    public $last_name;
    public $middle_initial;
    public $suffix;
    public $full_name;





    public function rules()
    {

    }

    public function mount($technology): void
    {
        $this->technology=$technology;
    }
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $generators=AbhGenerator::all();
        return view('livewire.abh.technology.technology-generator')->with([
            'generators' => $generators,
        ]);
    }
}
