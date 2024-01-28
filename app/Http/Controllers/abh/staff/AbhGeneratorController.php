<?php

namespace App\Http\Controllers\abh\staff;

use App\Http\Controllers\Controller;
use App\Models\abh\AbhGenerator;
use Illuminate\Http\Request;

class AbhGeneratorController extends Controller
{

    public function index()
    {
        $generators=\Auth::user()->abh_profile->generators;
        $generators->load('profile','contacts','technologies','expertise');
        return view('abh.generator.index',compact('generators'));
    }

    public function generator_details(AbhGenerator $generator)
    {
        return view('abh.generator.details',compact('generator'));
    }

    public function delete_generator(AbhGenerator $generator)
    {
        $generator->delete();
        return redirect()->back();
    }


}
