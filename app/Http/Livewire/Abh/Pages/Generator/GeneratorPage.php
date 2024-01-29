<?php

namespace App\Http\Livewire\Abh\Pages\Generator;

use App\Models\abh\AbhGenerator;
use App\View\Components\abh\AbhLayout;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Livewire\Component;

class GeneratorPage extends Component
{



    public function delete_generator(AbhGenerator $generator): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $generator->delete();
        return redirect(route("abh.staff.generators"));
    }

    public function render()
    {

        $generators=\Auth::user()->abh_profile->generators;
        $generators->load('profile','contacts','technologies','expertise');
        return view('livewire.abh.pages.generator.generator-page')
            ->with(['generators' => $generators])
            ->layout(AbhLayout::class);
    }
}
